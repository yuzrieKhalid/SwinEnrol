<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_type', function(Blueprint $table) {
            $table->string('unitCode');
            $table->string('courseCode');
            $table->string('typeId');

            $table->timestamps();

            $table->foreign('unitCode')->references('unitCode')->on('unit')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('courseCode')->references('courseCode')->on('course')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('typeId')->references('typeId')->on('type')
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
        Schema::drop('unit_type');
    }
}
