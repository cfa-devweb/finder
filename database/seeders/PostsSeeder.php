<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('posts')->insert([
                'name' => Str::random(10),
                'date_create' => Carbon::now(),
                'content' => Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ' . Str::random(10) . ' ',
                'adviser_id' => 1,
            ]);
    }
}
