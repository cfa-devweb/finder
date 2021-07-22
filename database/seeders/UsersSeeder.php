<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            'email' => 'ptitkens@gmail.com',
            'password' => 'kinderrr',
            'phone' => '811222',
            'email_verified_at' => Carbon::now()->subMinutes(rand(0,10080))->format('Y-m-d H:i:s'),
            /** 'password' => Hash::make('password'), */
            'student_id' => 1,
            ]);
    }
}
