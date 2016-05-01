<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudyPlanner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_planner', function (Blueprint $table) {
            $table->string('courseCode');
            $table->string('unitCode');
            $table->integer('year')->unsigned();
            $table->string('term');
            $table->timestamps();
            $table->primary('courseCode');
            $table->primary('unitCode');
            $table->primary('year');
            $table->primary('term');
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
