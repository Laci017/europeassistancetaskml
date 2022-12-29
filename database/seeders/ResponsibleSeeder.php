<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ResponsibleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('responsibles')->truncate();
        DB::table('responsibles')->insert(
            [
                ['task_id' => 1, 'user_id' => 1],
                ['task_id' => 2, 'user_id' => 1],
                ['task_id' => 3, 'user_id' => 2],
                ['task_id' => 4, 'user_id' => 3],
                ['task_id' => 5, 'user_id' => 2]
            ]);
        Schema::enableForeignKeyConstraints();
    }
}
