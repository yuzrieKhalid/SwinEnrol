<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('course')->insert([
            [
                'courseCode' => 'I047',
                'courseName' => 'Bachelor of Computer Science',
                'semestersPerYear' => 3,
                'semesterCount' => 7,
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'BICT',
                'courseName' => 'Bachelor of Information and Communication Technology',
                'semestersPerYear' => 3,
                'semesterCount' => 7,
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'BA-BUSACF1',
                'courseName' => 'Bachelor of Business (Accounting and Finance)',
                'semestersPerYear' => 2,
                'semesterCount' => 6,
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'BA-BUSFIN3',
                'courseName' => 'Bachelor of Business (Finance)',
                'semestersPerYear' => 2,
                'semesterCount' => 6,
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'BA-BUSINB4',
                'courseName' => 'Bachelor of Business (International Business)',
                'semestersPerYear' => 2,
                'semesterCount' => 6,
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'BA-BUSMGT5',
                'courseName' => 'Bachelor of Business (Human Resource Management)',
                'semestersPerYear' => 2,
                'semesterCount' => 6,
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'BA-BUSACC6',
                'courseName' => 'Bachelor of Business (Accounting)',
                'semestersPerYear' => 2,
                'semesterCount' => 6,
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'BA-BUSMKT6',
                'courseName' => 'Bachelor of Business (Marketing)',
                'semestersPerYear' => 2,
                'semesterCount' => 6,
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'BA-GRADG',
                'courseName' => 'Bachelor of Design (Graphic Design)',
                'semestersPerYear' => 2,
                'semesterCount' => 6,
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'BA-MULGD',
                'courseName' => 'Bachelor of Design (Multimedia Design)',
                'semestersPerYear' => 3,
                'semesterCount' => 9,
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'BH-ECV',
                'courseName' => 'Bachelor of Engineering (Civil) (Honours)',
                'semestersPerYear' => 2,
                'semesterCount' => 8,
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'SK401',
                'courseName' => 'Bachelor of Engineering (Chemical) (Honours)',
                'semestersPerYear' => 2,
                'semesterCount' => 8,
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'BH-EEE',
                'courseName' => 'Bachelor of Engineering (Electrical and Electronic) (Honours)',
                'semestersPerYear' => 2,
                'semesterCount' => 8,
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'BH-EME',
                'courseName' => 'Bachelor of Engineering (Mechanical) (Honours)',
                'semestersPerYear' => 2,
                'semesterCount' => 8,
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'BH-ERM',
                'courseName' => 'Bachelor of Engineering (Robotics and Mechatronics) (Honours)',
                'semestersPerYear' => 2,
                'semesterCount' => 8,
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'BA-SCBIO2',
                'courseName' => 'Bachelor of Science (Biotechnology)',
                'semestersPerYear' => 3,
                'semesterCount' => 9,
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // etc
            [
                'courseCode' => 'FICT',
                'courseName' => 'Foundation (ICT)',
                'semestersPerYear' => 2,
                'semesterCount' => 2,
                'studyLevel' => 'Foundation',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
