<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrolmentUnits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolment_units', function (Blueprint $table) {
            $table->integer('studentID')->unsigned();
            $table->string('unitCode');
            $table->integer('year')->unsigned();
            $table->('term');
            $table->('status');
            $table->timestamps();
            $table->primary('studentID');
            $table->primary('unitCode');
            $table->primary('year');
            $table->primary('term');
            $table->foreign('studentID')->references('studentID')->on('student');
            $table->foreign('unitCode')->references('unitCode')->on('unit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('enrolment_units');
    }
}
