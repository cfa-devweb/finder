<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('students')->insert([
                'first_name' => 'Kendrick',
                'last_name' => 'Francine',
                'gender' => 2,
                'birthday' => now(),
                'active' => true,
                'city' => 'Nouméa',
                'section_id' => 1,
                'user_id' => 1,
            ]);
    }
}
