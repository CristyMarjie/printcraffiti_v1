<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();

        $products = [
            [
                'category_id' => 1,
                'name' => 'White Mug',
                'specs' => 'White Sublimated Mug',
                'unit_price' => 250,
                'bundle_discount' => 10,
                'discount_percentage' => 10,
                'lead_time' => '2 business days',
                'status' => '1'
            ],
            [
                'category_id' => 3,
                'name' => 'White T-shirt',
                'specs' => 'Small white t-shirt',
                'unit_price' => 200,
                'bundle_discount' => 10,
                'discount_percentage' => 10,
                'lead_time' => '2 business days',
                'status' => '1'
            ]
        ];
        foreach ($products as $product){
            Product::create($product);
        }
    }
}
