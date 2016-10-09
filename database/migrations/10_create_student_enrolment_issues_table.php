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
            $table->binary('attachmentData');

            $table->timestamps();

            $table->foreign('studentID')->references('studentID')->on('student')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('issueID')->references('id')->on('enrolment_issues')
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
        Schema::drop('student_enrolment_issues');
    }
}
