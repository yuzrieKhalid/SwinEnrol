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
            $table->increments('id');
            $table->integer('year')->unsigned();
            $table->string('term');
            $table->date('reenrolmentOpenDate');
            $table->date('reenrolmentCloseDate');
            $table->date('adjustmentOpenDate');
            $table->date('adjustmentCloseDate');
            $table->date('examResultsRelease');
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
        Schema::drop('enrolment_dates');
    }
}
