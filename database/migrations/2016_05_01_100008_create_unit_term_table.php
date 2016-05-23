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
            $table->integer('year')->unsigned();
            $table->string('term');
            $table->string('enrolmentTerm');

            $table->foreign('unitType')->references('unitType')->on('unit_type');
            $table->foreign('unitCode')->references('unitCode')->on('unit');

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
