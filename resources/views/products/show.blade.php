<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-900 leading-tight">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg rounded-lg p-6">

            <!-- Product Info -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold text-gray-800 mb-2">{{ $product->name }}</h3>
                <p class="text-gray-600 mb-4">{{ $product->description }}</p>
                <span class="text-3xl font-extrabold text-blue-600">
                    ${{ number_format($product->price / 100, 2) }}
                </span>
            </div>

            <!-- Stripe Payment Form -->
            <form id="payment-form" action="{{ route('products.checkout', $product->id) }}" method="POST" class="space-y-6">
                @csrf

                <!-- HIDDEN INPUT MUST BE INSIDE FORM -->
                <input type="hidden" name="payment_method" id="payment_method">

                <div>
                    <label for="card-element" class="block text-gray-700 font-medium mb-2">Credit / Debit Card</label>
                    <div id="card-element" class="p-4 border rounded-md shadow-sm focus-within:ring-2 focus-within:ring-blue-500 transition"></div>
                </div>

                <button type="submit" 
                        class="w-full py-3 bg-blue-600 font-semibold rounded-md hover:bg-blue-700 transition shadow-lg">
                    Pay ${{ number_format($product->price / 100, 2) }}
                </button>
            </form>
        </div>
    </div>

    <!-- Stripe JS -->
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stripe = Stripe('{{ env("STRIPE_KEY") }}');
            const elements = stripe.elements();
            const card = elements.create('card', { 
                style: {
                    base: {
                        fontSize: '16px',
                        color: '#1F2937',
                        '::placeholder': { color: '#9CA3AF' },
                        fontFamily: 'Inter, sans-serif',
                        padding: '12px'
                    },
                    invalid: { color: '#EF4444' }
                },
                hidePostalCode: true
            });
            card.mount('#card-element');

            const form = document.getElementById('payment-form');
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                const {paymentMethod, error} = await stripe.createPaymentMethod('card', card);
                if (error) {
                    alert(error.message);
                    return;
                }

                // Set payment_method value
                document.getElementById('payment_method').value = paymentMethod.id;
                form.submit();
            });
        });
    </script>
</x-app-layout>
