<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternalCourseTransferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal_course_transfer', function (Blueprint $table) {
            $table->increments('formID');
            $table->string('studentID');
            $table->string('comment');
            $table->string('courseCode');

            $table->foreign('studentID')->references('studentID')->on('student');
            $table->foreign('courseCode')->references('courseCode')->on('course');
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
        Schema::drop('internal_course_transfer');
    }
}
