<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsHasJobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts_has_jobs')->insert([
            'id' => 1,
            'post_id' => 1,
            'job_id' => 1,
        ]);
    }
}
