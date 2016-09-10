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
            $table->string('prerequisite');//->nullable();
            $table->string('corequisite');//->nullable();
            $table->string('antirequisite');//->nullable();
            $table->integer('minimumCompletedUnits')->unsigned();
            $table->string('information');

            $table->primary('unitCode');
            // $table->foreign('prerequisite')->references('unitCode')->on('unit');
            // $table->foreign('corequisite')->references('unitCode')->on('unit');
            // $table->foreign('antirequisite')->references('unitCode')->on('unit');

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
