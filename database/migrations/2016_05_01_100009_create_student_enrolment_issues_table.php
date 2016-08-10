<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentEnrolmentIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_enrolment_issues', function(Blueprint $table)
        {
            $table->string('studentID');
            $table->integer('issueID')->unsigned();
            $table->string('status');
            $table->string('submissionData');

            $table->timestamps();

            $table->foreign('studentID')->references('studentID')->on('student');
            $table->foreign('issueID')->references('id')->on('enrolment_issues');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('student_enrolment_issues');
    }
}
