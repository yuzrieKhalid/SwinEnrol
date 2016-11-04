<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;



class StudyPlannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('study_planner')->insert([
            // Bachelor of Computer Science
            // Year 1 Sem 1
            [
                'unitCode' => 'COS10009',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COS10003',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COS10011',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'COS20001',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Year 1 Sem 2
            [
                'unitCode' => 'COS30023',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Year 1 Sem 3
            [
                'unitCode' => 'COS20015',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COS20007',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COS10004',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'SWE20001',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Year 2 Sem 1
            [
                'unitCode' => 'COS30008',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COS30043',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'SWE40001',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'SWE30010',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Year 2 Sem 2
            [
                'unitCode' => 'SWE30009',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COS30016',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Year 2 Sem 3
            [
                'unitCode' => 'SWE40002',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COS30017',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Year 3 Sem 1
            [
                'unitCode' => 'ICT30005',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '6',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COS30041',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '6',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
