<?php

namespace Database\Seeders;
use App\Models\Product;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'T-Shirt',
            'price' => 1999,
            'description' => 'Comfortable cotton T-shirt',
        ]);

        Product::create([
            'name' => 'Coffee Mug',
            'price' => 899,
            'description' => 'Ceramic mug with logo',
        ]);
    }
}
