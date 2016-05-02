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
            $table->increments('id');
            $table->string('courseCode');
            $table->string('unitCode');
            $table->integer('year')->unsigned();
            $table->string('term');
            $table->timestamps();
            $table->foreign('courseCode')->references('courseCode')->on('course');
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
        Schema::drop('study_planner');
    }
}
