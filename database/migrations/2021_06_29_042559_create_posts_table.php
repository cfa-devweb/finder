<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('name_company', 60);
            $table->string('concerned', 60);
            $table->date('date_create');
            $table->string('contact', 55);
            $table->string('content', 800);

            $table->foreignId('adviser_id')
                ->onDelete('cascade')
                ->onUpdate('cascade')
                ->constrained('advisers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
