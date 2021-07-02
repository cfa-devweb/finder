<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('sections')->insert([
                'class_name' => Str::random(10),
                'description' => Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ',
                'adviser_id' => 1,
                'job_id' => 1,
            ]);
    }
}
