<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('priorities')->truncate();
        DB::table('priorities')->insert(
        [
           ['id' => 1, 'name' => 'Normál', 'description' => 'Normál prioritás', 'color' => 'green'],
           ['id' => 2, 'name' => 'Sürgős', 'description' => 'Sürgős prioritás', 'color' => 'yellow'],
           ['id' => 3, 'name' => 'Kritikus', 'description' => 'Kritikus prioritás', 'color' => 'red'],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
