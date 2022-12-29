<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        DB::table('users')->insert(
            [
               ['id' => 1, 'name' => 'László', 'email' => 'laszlo@laszlo.com', 'password' => 'dummy'],
               ['id' => 2, 'name' => 'Tamás', 'email' => 'tamas@tamas.com','password' => 'dummy'],
               ['id' => 3, 'name' => 'Zoltán', 'email' => 'zoltan@zoltan.com','password' => 'dummy'],
               ['id' => 4, 'name' => 'Gábor', 'email' => 'gabor@gabor.com','password' => 'dummy'],
               ['id' => 5, 'name' => 'Balázs', 'email' => 'balazs@balazs.com','password' => 'dummy'],
            ]);
        Schema::enableForeignKeyConstraints();
    }
}
