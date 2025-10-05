<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function checkout(Request $request, Product $product)
    {
        $user = $request->user();
        $paymentMethod = $request->payment_method;

        $user->createOrGetStripeCustomer();
        $user->updateDefaultPaymentMethod($paymentMethod);

        try {
            $user->invoiceFor($product->name, $product->price);
            return redirect()->route('products.index')->with('success', 'Payment successful!');
        } catch (\Exception $e) {
            return back()->with('error', 'Payment failed: ' . $e->getMessage());
        }
    }
}
