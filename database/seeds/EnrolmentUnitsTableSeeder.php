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
                'studentID' => '4304373',
                'unitCode' => 'HIT3315',
                'year' => 2016,
                'term' => '2',
                'status' => 'confirmed',
                'result' => 65.00,
                'grade' => 'C',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => '4304373',
                'unitCode' => 'HIT3310',
                'year' => 2016,
                'term' => '2',
                'status' => 'dropped',
                'result' => 0.00,
                'grade' => 'NA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => '4304373',
                'unitCode' => 'MGT10001',
                'year' => 2016,
                'term' => '4',
                'status' => 'pending',
                'result' => 0.00,
                'grade' => 'ungraded',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => '4318595',
                'unitCode' => 'HIT3158',
                'year' => 2016,
                'term' => '4',
                'status' => 'pending',
                'result' => 0.00,
                'grade' => 'ungraded',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => '4318595',
                'unitCode' => 'MGT10001',
                'year' => 2016,
                'term' => '4',
                'status' => 'confirmed',
                'result' => 0.00,
                'grade' => 'ungraded',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => '4318595',
                'unitCode' => 'ACC10007',
                'year' => 2016,
                'term' => '4',
                'status' => 'confirmed',
                'result' => 0.00,
                'grade' => 'ungraded',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => '4315405',
                'unitCode' => 'MGT10001',
                'year' => 2016,
                'term' => '4',
                'status' => 'pending',
                'result' => 0.00,
                'grade' => 'ungraded',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => '4315405',
                'unitCode' => 'HIT3158',
                'year' => 2016,
                'term' => '4',
                'status' => 'pending',
                'result' => 0.00,
                'grade' => 'ungraded',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => '4315405',
                'unitCode' => 'MGT10001',
                'year' => 2016,
                'term' => '4',
                'status' => 'confirmed',
                'result' => 0.00,
                'grade' => 'ungraded',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => '4315405',
                'unitCode' => 'ACC10007',
                'year' => 2016,
                'term' => '4',
                'status' => 'confirmed',
                'result' => 0.00,
                'grade' => 'ungraded',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
