<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

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
            'type' => 1,
            'email' => 'ptitkens@gmail.com',
            'phone' => '811222',
            'email_verified_at' => Carbon::now()->subMinutes(rand(0,10080))->format('Y-m-d H:i:s'),
            'password' => 'kinderrr',
            /** 'password' => Hash::make('password'), */
            ]);
    }
}
