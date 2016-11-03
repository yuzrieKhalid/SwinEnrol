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
                'unitCode' => 'HIT3158',
                'year' => 2016,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
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
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
                'status' => 'pending',
                'result' => 0.00,
                'grade' => 'ungraded',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => '4318595',
                'unitCode' => 'ACC10007',
                'year' => 2016,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
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
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
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
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
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
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
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
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
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
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
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
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'status' => 'confirmed',
                'result' => 0.00,
                'grade' => 'ungraded',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => '4304373',
                'unitCode' => 'ACC10007',
                'year' => 2015,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
                'status' => 'dropped',
                'result' => 0.00,
                'grade' => 'fail',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => '4304373',
                'unitCode' => 'HIT3315',
                'year' => 2015,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
                'status' => 'confirmed',
                'result' => 65.00,
                'grade' => 'pass',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => '4304373',
                'unitCode' => 'MGT10001',
                'year' => 2015,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
                'status' => 'confirmed',
                'result' => 65.00,
                'grade' => 'pass',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // ********** Unit Approval Testing **********
            [
                'studentID' => 'test',
                'unitCode' => 'COMP',
                'year' => 2015,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
                'status' => 'confirmed',
                'result' => 65.00,
                'grade' => 'pass',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => 'test',
                'unitCode' => 'COMPA',
                'year' => 2015,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
                'status' => 'confirmed',
                'result' => 65.00,
                'grade' => 'pass',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => 'test',
                'unitCode' => 'COMPB',
                'year' => 2015,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
                'status' => 'confirmed',
                'result' => 65.00,
                'grade' => 'pass',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => 'test',
                'unitCode' => 'COMPC',
                'year' => 2015,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
                'status' => 'confirmed',
                'result' => 65.00,
                'grade' => 'pass',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => 'test',
                'unitCode' => 'PENDING',
                'year' => 2016,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
                'status' => 'pending',
                'result' => 65.00,
                'grade' => 'ungraded',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // success scenario
            [
                'studentID' => 'test',
                'unitCode' => 'PRE0',
                'year' => 2016,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
                'status' => 'pending',
                'result' => 0.00,
                'grade' => 'ungraded',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => 'test',
                'unitCode' => 'PRE10',
                'year' => 2016,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
                'status' => 'pending',
                'result' => 0.00,
                'grade' => 'ungraded',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => 'test',
                'unitCode' => 'PRE20',
                'year' => 2016,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
                'status' => 'pending',
                'result' => 0.00,
                'grade' => 'ungraded',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => 'test',
                'unitCode' => 'PRG0',
                'year' => 2016,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
                'status' => 'pending',
                'result' => 0.00,
                'grade' => 'ungraded',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => 'test',
                'unitCode' => 'COR0',
                'year' => 2016,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
                'status' => 'pending',
                'result' => 0.00,
                'grade' => 'ungraded',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => 'test',
                'unitCode' => 'MCOR0',
                'year' => 2016,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
                'status' => 'pending',
                'result' => 0.00,
                'grade' => 'ungraded',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => 'test',
                'unitCode' => 'ANTI0',
                'year' => 2016,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
                'status' => 'pending',
                'result' => 0.00,
                'grade' => 'ungraded',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => 'test',
                'unitCode' => 'MANTI0',
                'year' => 2016,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
                'status' => 'pending',
                'result' => 0.00,
                'grade' => 'ungraded',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => 'test',
                'unitCode' => 'CRP0',
                'year' => 2016,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
                'status' => 'pending',
                'result' => 0.00,
                'grade' => 'ungraded',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // already completed
            [
                'studentID' => 'test',
                'unitCode' => 'COMP',
                'year' => 2016,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
                'status' => 'pending',
                'result' => 0.00,
                'grade' => 'ungraded',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // prerequisite
            [
                'studentID' => 'test',
                'unitCode' => 'PRE1',
                'year' => 2016,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
                'status' => 'pending',
                'result' => 0.00,
                'grade' => 'ungraded',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // prerequisite AND
            [
                'studentID' => 'test',
                'unitCode' => 'PRE11',
                'year' => 2016,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
                'status' => 'pending',
                'result' => 0.00,
                'grade' => 'ungraded',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // prerequisite OR
            [
                'studentID' => 'test',
                'unitCode' => 'PRE21',
                'year' => 2016,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
                'status' => 'pending',
                'result' => 0.00,
                'grade' => 'ungraded',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // prerequisite group
            [
                'studentID' => 'test',
                'unitCode' => 'PRG1',
                'year' => 2016,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
                'status' => 'pending',
                'result' => 0.00,
                'grade' => 'ungraded',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // corequisite
            [
                'studentID' => 'test',
                'unitCode' => 'COR1',
                'year' => 2016,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
                'status' => 'pending',
                'result' => 0.00,
                'grade' => 'ungraded',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // corequisite multi
            [
                'studentID' => 'test',
                'unitCode' => 'MCOR1',
                'year' => 2016,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
                'status' => 'pending',
                'result' => 0.00,
                'grade' => 'ungraded',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // antirequisite
            [
                'studentID' => 'test',
                'unitCode' => 'ANTI1',
                'year' => 2016,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
                'status' => 'pending',
                'result' => 0.00,
                'grade' => 'ungraded',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // antirequisite
            [
                'studentID' => 'test',
                'unitCode' => 'MANTI1',
                'year' => 2016,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
                'status' => 'pending',
                'result' => 0.00,
                'grade' => 'ungraded',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // credit points
            [
                'studentID' => 'test',
                'unitCode' => 'CRP1',
                'year' => 2016,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
                'status' => 'pending',
                'result' => 0.00,
                'grade' => 'ungraded',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // short semester
            [
                'studentID' => '4304373',
                'unitCode' => 'SHO27',
                'year' => 2016,
                'semester' => 'Semester 1',
                'semesterLength' => 'short',
                'status' => 'pending',
                'result' => 0.00,
                'grade' => 'ungraded',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // articulation
            [
                'studentID' => 'articulate',
                'unitCode' => 'FO1',
                'year' => 2015,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
                'status' => 'confirmed',
                'result' => 0.00,
                'grade' => 'pass',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => 'articulate',
                'unitCode' => 'FO2',
                'year' => 2015,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'status' => 'confirmed',
                'result' => 0.00,
                'grade' => 'pass',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
