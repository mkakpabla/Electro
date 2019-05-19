<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::create([
            'name' => 'Laptops',
            'slug' => 'laptops',
            'cover' => '/images/shop01.png'
        ]);

        \App\Category::create([
            'name' => 'Smartphones',
            'slug' => 'smartphones',
            'cover' => '/images/shop02.png'
        ]);
        \App\Category::create([
            'name' => 'Cameras',
            'slug' => 'cameras',
            'cover' => '/images/shop03.png'
        ]);
        \App\Category::create([
            'name' => 'Accessories',
            'slug' => 'accessories',
            'cover' => '/images/shop03.png'
        ]);
    }
}
