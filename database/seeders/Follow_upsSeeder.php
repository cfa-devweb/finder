<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class Follow_upsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('follow_ups')->insert([
                'date' => Carbon::now(),
                'comment' => Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ',
                'mode_contact' => 'visite',
                'nom_contact'=> 'Jean-Pierre Marquez',
                'answer'=> 1,
                'prospect_id' => 1,
            ]);
    }
}
