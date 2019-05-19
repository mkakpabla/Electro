<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 1000; $i++) {
        \App\Image::create([
            'path' => '/images/product0'. rand(1, 9) . '.png',
            'product_id' => rand(1, 60)
        ]);
        }
    }
}
