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
            $table->decimal('creditPoints', 5, 2);
            $table->string('studyLevel');

            $table->timestamps();

            $table->primary('unitCode');
            $table->foreign('studyLevel')->references('studyLevel')->on('study_level')
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
        Schema::drop('unit');
    }
}
