<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            [
                'id' => 1,
                'type' => 1,
                'email' => 'student@test.nc',
                'email_verified_at' => now(),
                'password' => Hash::make('test'),
                'api_token' => Str::random(60),
            ],
            [
                'id' => 2,
                'type' => 2,
                'email' => 'adviser@test.nc',
                'email_verified_at' => now(),
                'password' => Hash::make('test'),
                'api_token' => Str::random(60),
            ],
        ]);
    }
}
