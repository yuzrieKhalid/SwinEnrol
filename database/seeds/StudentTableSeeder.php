<?php

use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('student')->insert([
            [
                'studentID' => '4304373',
                'title' => 'Mr',
                'gender' => 'M',
                'dateOfBirth' => '2016-01-01',
                'surname' => 'Meme',
                'givenName' => 'Dank',
                'email' => 'email@mail.com',
                'overseasAddress' => 'overseasAddress',
                'overseasCountry' => 'overseasCountry',
                'overseasPostcode' => 'overseasPostcode',
                'malaysianAddress' => 'malaysianAddress',
                'malaysianState' => 'malaysianState',
                'malaysianPostcode' => 'malaysianPostcode',
                'overseasTelephone' => 'overseasTelephone',
                'malaysianTelephone' => 'malaysianTelephone',
                'fax' => '082082082',
                'mobile' => '0123456789',
                'countryOfCitizenship' => 'Antartica',
                'birthCountry' => 'Antartica',
                'identityCardOrPassportNumber' => 'identityCardOrPassportNumber',
                'passportExpiry' => 'passportExpiry',
                'visaValidity' => 'visaValidity',
                'visaType' => 'visaType',
                'visaExpiry' => '2020-01-01',
                'visaCollectionLocation' => 'Antartica',
                'courseAccepted1' => 'Sleeping',
                'courseAccepted2' => 'DotA2',
                'courseAccepted3' => 'Graduation',
                'courseCommencement' => '2016-01-01',
                'emergencyContactName' => 'Name',
                'emergencyContactAddress' => 'Antartica',
                'emergencyContactTelephone' => '0123456789',
                'emergencyContactEmail' => 'email@mail.com',
                'emergencyContactRelationship' => 'spouse',
                'emergencyContactSpokenLanguage' => 'Russian',
                'acceptanceDate' => '2016-01-01'
            ],
            [
                'studentID' => '5555555',
                'title' => 'Ms',
                'gender' => 'F',
                'dateOfBirth' => '2015-01-01',
                'surname' => 'Ravage',
                'givenName' => 'Sheever',
                'email' => 'email2@email.com',
                'overseasAddress' => 'overseasAddress2',
                'overseasCountry' => 'overseasCountry2',
                'overseasPostcode' => 'overseasPostcode2',
                'malaysianAddress' => 'malaysianAddress2',
                'malaysianState' => 'malaysianState2',
                'malaysianPostcode' => 'malaysianPostcode2',
                'overseasTelephone' => 'overseasTelephone2',
                'malaysianTelephone' => 'malaysianTelephone2',
                'fax' => '083083083',
                'mobile' => '0123456788',
                'countryOfCitizenship' => 'Germany',
                'birthCountry' => 'Germany',
                'identityCardOrPassportNumber' => 'identityCard2',
                'passportExpiry' => 'passportExpiry2',
                'visaValidity' => 'visaValidity2',
                'visaType' => 'visaType',
                'visaExpiry' => '2021-01-01',
                'visaCollectionLocaiton' => 'Germany',
                'courseAccepted1' => 'Hosting',
                'courseAccepted2' => 'DotA2',
                'courseAccepted3' => 'Event',
                'courseCommencement' => '2018-01-01',
                'emergencyContactName' => 'Name2',
                'emergencyContactAddress' => 'Germany',
                'emergencyContactTelephone' => '0123456788',
                'emergencyContactEmail' => 'email2@mail.com',
                'emergencyContactRelationship' => 'mother',
                'emergencyContactSpokenLanguage' => 'Korean',
                'acceptanceDate' => '2017-01-01'
            ]
        ]);
    }
}
