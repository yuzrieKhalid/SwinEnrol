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
            $table->string('unitCode');
            $table->integer('year')->unsigned();
            $table->string('term');
            $table->string('semesterLength');
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
