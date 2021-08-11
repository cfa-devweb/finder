<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersSeeder::class,
            AdvisersSeeder::class,
            JobsSeeder::class,
            SectionsSeeder::class,
            StudentsSeeder::class,
            ResumesSeeder::class,
            EnterprisesSeeder::class,
            Follow_upsSeeder::class,
            PostsSeeder::class,
            PostsHasJobsSeeder::class,
        ]);
    }
}
