<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EnrolmentUnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('enrolment_units')->insert([
            [
                'studentID' => '4318595',
                'unitCode' => 'COS10009',
                'year' => 2016,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
                'status' => 'pending',
                'result' => 0.00,
                'grade' => 'ungraded',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
