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
                'gender' => 'homme',
                'email' => 'kinder@gmail.com',
                'email_verified_at' => Carbon::now()->subMinutes(rand(0,10080))->format('Y-m-d H:i:s'),
                'date_of_birth' => Carbon::now(),
                'city' => 'Nouméa',
                'phone' => '696969',
                'password' => 'kinder',
                /** 'password' => Hash::make('password'), */ 
                'section_id' => 1,
            ]);
    }
}
