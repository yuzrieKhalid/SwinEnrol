<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrolmentIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolment_issues', function (Blueprint $table) {
            $table->increments('issueID');
            $table->integer('studentID')->unsigned();
            $table->string('issueType');
            $table->string('status');
            $table->timestamps();
            // $table->foreign('studentID')->references('studentID')->on('student');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('enrolment_issues');
    }
}
