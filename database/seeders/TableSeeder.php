<?php

namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tables = [
            ['capacity' => 2],
            ['capacity' => 3],
            ['capacity' => 5],
            ['capacity' => 7],
            ['capacity' => 10],
            ['capacity' => 1]
        ];

        DB::table('tables')->insert($tables);
    }
}
