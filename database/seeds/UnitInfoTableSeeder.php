<?php

use Illuminate\Database\Seeder;

class UnitInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('unit_info')->insert([
            [
                'unitCode' => 'FO1',
                'year' => 2016,
                'semester' => 'Semester 1',
                'convenor' => 'Convenor',
                'maxStudentCount' => 100,
                'lectureDuration' => 2,
                'lectureGroupCount' => 10,
                'tutorialDuration' => 2,
                'tutorialGroupCount' => 10,
                'lecturers' => '["Lecturer","Lecturer2"]',
                'tutors' => '["Tutor","Tutor2"]'
            ],
            [
                'unitCode' => 'FO2',
                'year' => 2016,
                'semester' => 'Semester 1',
                'convenor' => 'Convenor',
                'maxStudentCount' => 100,
                'lectureDuration' => 2,
                'lectureGroupCount' => 10,
                'tutorialDuration' => 2,
                'tutorialGroupCount' => 10,
                'lecturers' => '["Lecturer","Lecturer2"]',
                'tutors' => '["Tutor","Tutor2"]'
            ]
        ]);
    }
}
