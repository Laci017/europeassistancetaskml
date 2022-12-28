<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->truncate();
        DB::table('tasks')->insert(
            [
                ['id' => 1, 'name' => 'Szerződéskötés', 'description' => 'megrendelővel megkötni a szerződést', 'priority_id' => 1, 'status_id' => 1, 'created_by' => 1, 'deadline' => '2022-10-26 12:00'],
                ['id' => 2, 'name' => 'Igényfelmérés', 'description' => 'felmérni az igényeket', 'priority_id' => 1, 'status_id' => 1, 'created_by' => 1, 'deadline' => '2022-10-26 12:00'],
                ['id' => 3, 'name' => 'Frontend design', 'description' => 'frontend elemek, színek, szimbólumok', 'priority_id' => 1, 'status_id' => 1, 'created_by' => 1, 'deadline' => '2022-10-26 12:00'],
                ['id' => 4, 'name' => 'XML api fejlesztés', 'description' => 'Bejövő adat fogadása, feldolgozása', 'priority_id' => 1, 'status_id' => 1, 'created_by' => 1, 'deadline' => '2022-10-26 12:00'],
                ['id' => 5, 'name' => 'Nyomtató hibájának elhárítása', 'description' => 'Hiba feltárás', 'priority_id' => 1, 'status_id' => 1, 'created_by' => 1, 'deadline' => '2022-10-26 12:00'],
                ['id' => 6, 'name' => 'Hardver beszerzés', 'description' => 'Régi hardverek cseréje', 'priority_id' => 1, 'status_id' => 1, 'created_by' => 1, 'deadline' => '2022-10-26 12:00'],
                ['id' => 7, 'name' => 'Számlák postázása', 'description' => 'Papír alapú számlák postázása', 'priority_id' => 1, 'status_id' => 1, 'created_by' => 1, 'deadline' => '2022-10-26 12:00'],
                ['id' => 8, 'name' => 'DB terv', 'description' => 'Induló project DB tervezése', 'priority_id' => 1, 'status_id' => 1, 'created_by' => 1, 'deadline' => '2022-10-26 12:00'],
            ]
        );
    }
}
