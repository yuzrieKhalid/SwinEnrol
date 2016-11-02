<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_info', function (Blueprint $table) {
            $table->string('unitCode');
            $table->string('year');
            $table->string('semester');
            $table->string('convenor');
            $table->integer('maxStudentCount')->unsigned();
            $table->integer('lectureDuration')->unsigned();
            $table->integer('lectureGroupCount')->unsigned();
            $table->integer('tutorialDuration')->unsigned();
            $table->integer('tutorialGroupCount')->unsigned();
            $table->string('lecturers');
            $table->string('tutors');
            $table->timestamps();

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
        Schema::drop('unit_info');
    }
}
