<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrolmentDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolment_dates', function (Blueprint $table) {
            $table->integer('year')->unsigned();
            $table->string('term');
            $table->date('openDate');
            $table->date('closeDate');
            $table->timestamps();
            $table->primary('year');
            $table->primary('term');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('enrolment_dates');
    }
}
