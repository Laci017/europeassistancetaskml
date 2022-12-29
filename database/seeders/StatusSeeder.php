<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('statuses')->truncate();
        DB::table('statuses')->insert(
            [
                ['id' => 1, 'name' => 'Bejelentve'],
                ['id' => 2, 'name' => 'Hozzáadva valakihez'],
                ['id' => 3, 'name' => 'Folyamatban'],
                ['id' => 4, 'name' => 'Tesztelhető'],
                ['id' => 5, 'name' => 'Kész']
            ]);
        Schema::enableForeignKeyConstraints();
    }
}
