<?php

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
        $faker = new \Faker\Generator();
        for ($i = 0; $i < 60; $i++) {
            \App\Product::create([
                'name' => 'Products' . $i,
                'slug' => 'products-' . $i,
                'details' => 'iusto laboriosam magni necessitatibus nulla, officiis, pariatur porro repudiandae voluptatem voluptatibus!',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus consequuntur dicta fuga minima numquam quis unde. Architecto illum ipsam, iusto laboriosam magni necessitatibus nulla, officiis, pariatur porro repudiandae voluptatem voluptatibus!',
                'cover' => '/images/product0' . rand(1, 9) . '.png',
                'price' => 8000 + $i
            ])->categories()->attach(rand(1, 4));
        }
    }
}
