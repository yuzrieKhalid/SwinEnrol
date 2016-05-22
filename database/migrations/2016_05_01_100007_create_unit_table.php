<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit', function(Blueprint $table)
        {
            $table->string('unitCode');
            $table->string('unitName');
            $table->string('courseCode');
            $table->boolean('core');
            $table->string('prerequisite');
            $table->string('corequisite');
            $table->string('antirequisite');
            $table->integer('minimumCompletedUnits')->unsigned();

            $table->primary('unitCode');
            $table->foreign('courseCode')->references('courseCode')->on('course');

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
        Schema::drop('unit');
    }
}
