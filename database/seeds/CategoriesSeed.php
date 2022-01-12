<?php

use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoriesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Clothes',
            'created_at' => Carbon::now(),
        ]);

        Category::create([
            'name' => 'Shoes',
            'created_at' => Carbon::now(),
        ]);

        Category::create([
            'name' => 'Watches',
            'created_at' => Carbon::now(),
        ]);

        Category::create([
            'name' => 'Electronics',
            'created_at' => Carbon::now(),
        ]);

        Category::create([
            'name' => 'Perfume',
            'created_at' => Carbon::now(),
        ]);
    }
}
