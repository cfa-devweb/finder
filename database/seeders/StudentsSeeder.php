<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

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
                'first_name' => Str::random(10),
                'last_name' => Str::random(10),
                'gender' => 2,
                'birthday' => Carbon::now(),
                'active' => true,
                'city' => 'Nouméa',
                /** 'password' => Hash::make('password'), */ 
                'section_id' => 1,
            ]);
    }
}
