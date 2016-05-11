<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function(Blueprint $table) {
            $table->increments('studentID');
            $table->string('title');
            $table->string('gender', 1);
            $table->date('dateOfBirth');
            $table->string('surname');
            $table->string('givenName');
            $table->string('email');
            $table->string('overseasAddress');
            $table->string('overseasCountry');
            $table->string('overseasPostcode');
            $table->string('malaysianAddress');
            $table->string('malaysianState');
            $table->string('malaysianPostcode');
            $table->string('overseasTelephone');
            $table->string('malaysianTelephone');
            $table->string('fax');
            $table->string('mobile');
            $table->string('countryOfCitizenship');
            $table->string('birthCountry');
            $table->string('identityCardOrPassportNumber');
            $table->date('passportExpiry');
            $table->string('visaValidity');
            $table->string('visaType');
            $table->date('visaExpiry');
            $table->string('visaCollectionLocation');
            $table->string('courseAccepted1');
            $table->string('courseAccepted2');
            $table->string('courseAccepted3');
            $table->date('courseCommencement');
            $table->string('emergencyContactName');
            $table->string('emergencyContactAddress');
            $table->string('emergencyContactTelephone');
            $table->string('emergencyContactFax');
            $table->string('emergencyContactMobile');
            $table->string('emergencyContactEmail');
            $table->string('emergencyContactRelationship');
            $table->string('emergencyContactSpokenLanguage');
            $table->date('acceptanceDate');
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
        Schema::drop('student');
    }
}
