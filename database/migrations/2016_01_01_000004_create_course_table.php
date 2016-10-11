<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course', function (Blueprint $table)
        {
            $table->string('courseCode');
            $table->string('courseName');
            $table->integer('semestersPerYear')->unsigned();
            $table->integer('semesterCount')->unsigned();
            $table->string('studyLevel');

            $table->primary('courseCode');
            $table->foreign('studyLevel')->references('studyLevel')->on('study_level')
            ->onDelete('cascade')->onUpdate('cascade');

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
        Schema::drop('course');
    }
}
