<?php

use Illuminate\Database\Seeder;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Coupon::create([
            'code' => 'abcd',
            'type' => 'fixed',
            'value' => 80,
        ]);
        \App\Coupon::create([
            'code' => 'abcde',
            'type' => 'percent',
            'percent_off' => 50,
        ]);
    }
}
