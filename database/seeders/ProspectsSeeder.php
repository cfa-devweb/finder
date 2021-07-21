<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class ProspectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('prospects')->insert([
                'company_name' => Str::random(10),
                'email_contact' => Str::random(10) . '@gmail.com',
                'phone_contact' => '123456',
                'student_id' => 1,
            ]);
    }
}
