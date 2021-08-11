<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowUpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follow_ups', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('date');
            $table->string('comment')->nullable();
            $table->string('mode_contact');
            $table->string('name_contact');
            $table->enum('answer', ['waiting', 'accepted', 'refusal', 'sign']);

            $table->foreignId('enterprise_id')
                ->constrained('enterprises')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('student_id')
                ->constrained('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follow_ups');
    }
}
