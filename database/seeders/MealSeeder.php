<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meals = [
            [
                'price' => 10.15,
                'description' => "meal description",
                'quantity_available' => 0,
                'discount' => 10
            ],
            [
                'price' => 25.99,
                'description' => "meal description",
                'quantity_available' => 5,
                'discount' => 18
            ],
            [
                'price' => 36.89,
                'description' => "meal description",
                'quantity_available' => 7,
                'discount' => 50
            ],
            [
                'price' => 151.89,
                'description' => "meal description",
                'quantity_available' => 5,
                'discount' => 28
            ],
            [
                'price' => 265.11,
                'description' => "meal description",
                'quantity_available' => 8,
                'discount' => 46
            ]
        ];

        DB::table('meals')->insert($meals);

    }
}
