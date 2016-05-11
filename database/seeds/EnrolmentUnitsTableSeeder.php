<?php

use Illuminate\Database\Seeder;

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
                'studentID' => '4304373',
                'unitCode' => 'HIT3315',
                'year' => 2016,
                'term' => '2',
                'status' => 'confirmed',
                'result' => 65.00,
                'grade' => 'C'
            ],
            [
                'studentID' => '5555555',
                'unitCode' => 'HIT3315',
                'year' => 2016,
                'term' => '2',
                'status' => 'confirmed',
                'result' => 95.50,
                'grade' => 'HD'
            ],
            [
                'studentID' => '5555555',
                'unitCode' => 'HIT3158',
                'year' => 2016,
                'term' => '4',
                'status' => 'pending',
                'result' => 0.00,
                'grade' => 'ungraded'
            ]
        ]);
    }
}
