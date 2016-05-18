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
            $table->integer('studentID')->unsigned();
            $table->string('comment');
            $table->string('courseCode');
            $table->timestamps();
            // $table->foreign('studentID')->references('studentID')->on('student');
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
