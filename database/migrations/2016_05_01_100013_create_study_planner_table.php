<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudyPlannerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_planner', function (Blueprint $table) {
            $table->string('unitCode');
            $table->string('courseCode');
            $table->string('typeId');
            $table->integer('year')->unsigned();
            $table->string('semester');
            $table->integer('enrolmentTerm')->unsigned();

            $table->timestamps();

            $table->foreign('unitCode')->references('unitCode')->on('unit')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('courseCode')->references('courseCode')->on('course')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('unitType')->references('unitType')->on('unit_type')
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
        Schema::drop('study_planner');
    }
}
