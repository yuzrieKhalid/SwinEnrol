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
            // ********** Unit Approval Testing **********
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
            [
                'studentID' => '4304373',
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
                'studentID' => '4304373',
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
                'studentID' => '4304373',
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
                'studentID' => '4304373',
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
            // success scenario
            [
                'studentID' => '4304373',
                'unitCode' => 'GEN0',
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
                'studentID' => '4304373',
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
                'studentID' => '4304373',
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
                'studentID' => '4304373',
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
                'studentID' => '4304373',
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
                'studentID' => '4304373',
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
            // already completed
            [
                'studentID' => '4304373',
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
                'studentID' => '4304373',
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
            // multi prerequisite
            [
                'studentID' => '4304373',
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
            // prerequisite group
            [
                'studentID' => '4304373',
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
            // antirequisite
            [
                'studentID' => '4304373',
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
            // minimumCompletedUnits
            [
                'studentID' => '4304373',
                'unitCode' => 'UNI20',
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
                'studentID' => '4304373',
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
