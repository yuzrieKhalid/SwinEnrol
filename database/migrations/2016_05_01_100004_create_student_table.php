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
            $table->string('email');
            $table->string('courseCode');

            $table->timestamps();

            $table->primary('studentID');
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
