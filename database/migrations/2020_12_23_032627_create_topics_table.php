<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('course_id');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->integer('teacher_id');
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->string('NameTopic', 100);
            $table->integer('cost');
            $table->string('address_Pic', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topics');
    }
}
