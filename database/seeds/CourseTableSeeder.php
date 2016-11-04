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
                'courseCode' => 'BA-BUSFIN3',
                'courseName' => 'Bachelor of Business (Finance)',
                'semestersPerYear' => 2,
                'semesterCount' => 6,
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
                'courseCode' => 'BA-MULGD',
                'courseName' => 'Bachelor of Design (Graphic Design)',
                'semestersPerYear' => 3,
                'semesterCount' => 9,
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
            [
                'courseCode' => 'F4-K002',
                'courseName' => 'Bachelor of Engineering (Civil)(Honours)',
                'semestersPerYear' => 2,
                'semesterCount' => 8,
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'BH-ERM',
                'courseName' => 'Bachelor of Robotics and Mechatronics (Honours)',
                'semestersPerYear' => 2,
                'semesterCount' => 8,
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
