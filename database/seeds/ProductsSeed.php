<?php

use App\Product;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'category_id' => 4,
            'name' => 'Kui Ye Chen’s AirPods',
            'price' => '2500000',
            'desc' => 'A Kui Ye Chen’s AirPods',
            'image' => 'products/product-1.jpg',
            'created_at' => Carbon::now(),
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'Air Jordan 12 gym red',
            'price' => '1500000',
            'desc' => 'A Air Jordan 12 gym red',
            'image' => 'products/product-2.jpg',
            'created_at' => Carbon::now(),
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Cyan cotton t-shirt',
            'price' => '5500000',
            'desc' => 'A Cyan cotton t-shirt',
            'image' => 'products/product-3.jpg',
            'created_at' => Carbon::now(),
        ]);

        Product::create([
            'category_id' => 4,
            'name' => 'Timex Unisex Originals',
            'price' => '2800000',
            'desc' => 'A Timex Unisex Originals',
            'image' => 'products/product-4.jpg',
            'created_at' => Carbon::now(),
        ]);

        Product::create([
            'category_id' => 5,
            'name' => 'Joemalone Women prefume',
            'price' => '17000',
            'desc' => 'A Joemalone Women prefume',
            'image' => 'products/product-7.jpg',
            'created_at' => Carbon::now(),
        ]);
    }
}
