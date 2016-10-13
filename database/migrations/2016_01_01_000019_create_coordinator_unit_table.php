<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoordinatorUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coordinator_units', function (Blueprint $table) {
            $table->string('username');
            $table->string('unitCode');

            $table->timestamps();

            $table->foreign('username')->references('username')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('unitCode')->references('unitCode')->on('unit')
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
        Schema::drop('coordinator_units');
    }
}
