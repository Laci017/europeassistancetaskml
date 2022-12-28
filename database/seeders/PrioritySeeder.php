<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('priorities')->truncate();
        DB::table('priorities')->insert(
        [
           ['id' => 1, 'name' => 'Normál', 'description' => 'Normál prioritás', 'color' => 'green'],
           ['id' => 2, 'name' => 'Sürgős', 'description' => 'Sürgős prioritás', 'color' => 'yellow'],
           ['id' => 3, 'name' => 'Kritikus', 'description' => 'Kritikus prioritás', 'color' => 'red'],
        ]);
    }
}
