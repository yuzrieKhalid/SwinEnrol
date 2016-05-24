<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrolmentUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolment_units', function (Blueprint $table)
        {
            $table->string('studentID');
            $table->string('unitCode');
            $table->integer('year')->unsigned();    // future update may change type to datetime
            $table->string('term');
            $table->string('status');
            $table->string('result');
            $table->decimal('grade', 5, 2);

            $table->timestamps();

            $table->foreign('studentID')->references('studentID')->on('student');
            $table->foreign('unitCode')->references('unitCode')->on('unit')->onDelete('cascade');
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
