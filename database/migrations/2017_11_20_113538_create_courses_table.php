<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('teacher_id')->unsigned()->nullable();
            $table->integer('subject_id')->unsigned();
            $table->string('class');
            $table->integer('course_code')->unique();
            $table->integer('semester');
            $table->time('time_finish');
            $table->time('time_start');
            $table->string('weekday');
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
        Schema::dropIfExists('courses');
    }
}
