<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGraduationRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graduation_requirements', function (Blueprint $table) {
            $table->string('courseCode');
            $table->string('typeId');
            $table->integer('unitCount')->unsigned();

            $table->timestamps();

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
        Schema::drop('graduation_requirements');
    }
}
