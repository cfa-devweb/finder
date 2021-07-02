<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ResumesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('resumes')->insert([
                'driverlicense' => 1,
                'vehicle' => 0,
                'skills' => Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ',
                'experiences' => Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ',
                'student_id' => 1,
                'id' => 1,

            ]);
    }
}
