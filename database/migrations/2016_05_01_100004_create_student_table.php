<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function(Blueprint $table)
        {
            $table->string('studentID');
            $table->string('surname');
            $table->string('givenName');
            $table->string('courseCode');
            $table->integer('year')->unsigned();
            $table->string('term');

            $table->timestamps();

            $table->primary('studentID');
            $table->foreign('courseCode')->references('courseCode')->on('course');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('student');
    }
}
