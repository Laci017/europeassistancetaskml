<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert(
            [
               ['id' => 1, 'name' => 'Laci017', 'email' => 'laci017@gmail.com', 'password' => '$2y$10$Oy5aXbr/Jtvcw15RtPoKpOFgfIqt1x7NI4yZ9HFkE5Dj/ghk3QgRm'],
               ['id' => 2, 'name' => 'Tamás', 'email' => 'tamas@tamas.com','password' => 'dummy'],
               ['id' => 3, 'name' => 'Zoltán', 'email' => 'zoltan@zoltan.com','password' => 'dummy'],
               ['id' => 4, 'name' => 'Gábor', 'email' => 'gabor@gabor.com','password' => 'dummy'],
               ['id' => 5, 'name' => 'Balázs', 'email' => 'balazs@balazs.com','password' => 'dummy'],
            ]);
    }
}
