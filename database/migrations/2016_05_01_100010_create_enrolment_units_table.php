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
            $table->integer('year')->unsigned();
            $table->string('term');
            $table->string('semesterLength');
            $table->string('status');
            $table->decimal('result', 5, 2);
            $table->string('grade');

            $table->timestamps();

            $table->foreign('studentID')->references('studentID')->on('student')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('unitCode')->references('unitCode')->on('unit')
            ->onDelete('cascade')->onUpdate('cascade');
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
