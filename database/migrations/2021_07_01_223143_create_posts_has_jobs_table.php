<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsHasJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_has_jobs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('post_id')
                ->constrained('posts');

            $table->foreignId('job_id')
                ->constrained('jobs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts_has_jobs');
    }
}
