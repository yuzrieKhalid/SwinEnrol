<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitTermTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_term', function (Blueprint $table) {
            $table->string('unitType');
            $table->string('unitCode');
            $table->string('courseCode');
            $table->integer('year')->unsigned();
            $table->string('term');
            $table->string('enrolmentTerm');

            $table->foreign('unitType')->references('unitType')->on('unit_type')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('unitCode')->references('unitCode')->on('unit')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('courseCode')->references('courseCode')->on('course')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('unit_term');
    }
}
