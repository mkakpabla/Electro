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
            'slug' => 'laptops'
        ]);

        \App\Category::create([
            'name' => 'Desktop',
            'slug' => 'desktop'
        ]);
    }
}
