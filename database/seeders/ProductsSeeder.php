<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                "user_id" => 1,
                "name" => "პროდუქტი1",
                "length" => 100,
                "width" => 200,
                "height" => 300,
                "weight" => 400,
            ],
            [
                "user_id" => 1,
                "name" => "პროდუქტი2",
                "length" => 200,
                "width" => 300,
                "height" => 400,
                "weight" => 500,
            ],
        ];

        // Loop Through Products
        foreach($products as $key => $product)
        {
            Product::create($product);
        }
    }
}
