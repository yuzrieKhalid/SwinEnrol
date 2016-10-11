<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('eduversal')->create('student_records', function(Blueprint $table)
        {
            $table->string('studentID');
            $table->string('surname');
            $table->string('givenName');
            $table->string('courseCode');
            $table->integer('year')->unsigned();
            $table->string('term');
            $table->string('paymentStatus');

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
        Schema::connection('eduversal')->drop('student_records');
    }
}
