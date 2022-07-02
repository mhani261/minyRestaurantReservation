<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = [
            [
                'name' => "customer 1",
                'phone' => 123456789
            ],
            [
                'name' => "customer 2",
                'phone' => 987654321
            ],
            [
                'name' => "customer 3",
                'phone' => 147852369
            ],
            [
                'name' => "customer 4",
                'phone' => 456789321
            ],
            [
                'name' => "customer 5",
                'phone' => 369852147
            ]
        ];

        DB::table('customers')->insert($customers);
    }
}
