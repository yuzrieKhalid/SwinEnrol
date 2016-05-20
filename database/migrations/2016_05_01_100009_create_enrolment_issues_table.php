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
        Schema::create('enrolment_issues', function (Blueprint $table)
        {
            $table->string('studentID');
            $table->integer('issueID')->unique();
            $table->string('status');

            $table->foreign('studentID')->references('studentID')->on('student');
            $table->foreign('issueID')->references('issueID')->on('enrolment_issues');
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
        Schema::drop('enrolment_issues');
    }
}
