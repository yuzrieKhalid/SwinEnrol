<?php

use Illuminate\Database\Seeder;

class EnrolmentDatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('enrolment_dates')->insert([
            'year' => 2016,
            'term' => '2',
            'openDate' => '2016-01-01',
            'closeDate' => '2017-01-01'
        ]);
    }
}
