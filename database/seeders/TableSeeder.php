<?php

namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Table::factory(2)->create();
        Table::factory(2)->create(['capacity' => 4]);
        Table::factory(2)->create(['capacity' => 10]);
    }
}
