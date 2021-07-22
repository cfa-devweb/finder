<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EnterprisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('prospects')->insert([
                'name_company' => Str::random(10),
                'name_contact' => Str::random(10),
                'email_contact' => Str::random(10) . '@gmail.com',
                'phone_contact' => '123456',
                'student_id' => 1,
            ]);
    }
}
