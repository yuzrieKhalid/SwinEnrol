<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitListingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_listing', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year')->unsigned();
            $table->string('term');
            $table->string('unitCode');
            $table->timestamps();
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
        Schema::drop('unit_listing');
    }
}
