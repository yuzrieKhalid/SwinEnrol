<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('unit')->insert([
            [
                'unitCode' => 'HIT3315',
                'unitName' => 'Languages in Software Development',
                'prerequisite' => NULL,
                'corequisite' => NULL,
                'antirequisite' => NULL,
                'minimumCompletedUnits' => '0',
                'maxStudentCount' => 100,
                'lectureGroupCount' => 10,
                'lectureDuration' => '2h',
                'tutorialGroupCount' => 10,
                'tutorialDuration' => '2h',
                'unitInfo' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HIT3158',
                'unitName' => 'Software Engineering Project A',
                'prerequisite' => 'HIT3315',
                'corequisite' => NULL,
                'antirequisite' => NULL,
                'minimumCompletedUnits' => '0',
                'maxStudentCount' => 100,
                'lectureGroupCount' => 10,
                'lectureDuration' => '2h',
                'tutorialGroupCount' => 10,
                'tutorialDuration' => '2h',
                'unitInfo' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HIT3310',
                'unitName' => 'Software Architecture and Design',
                'prerequisite' => NULL,
                'corequisite' => NULL,
                'antirequisite' => NULL,
                'minimumCompletedUnits' => '0',
                'maxStudentCount' => 100,
                'lectureGroupCount' => 10,
                'lectureDuration' => '2h',
                'tutorialGroupCount' => 10,
                'tutorialDuration' => '2h',
                'unitInfo' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HIT1234',
                'unitName' => 'Internet Technologies',
                'prerequisite' => NULL,
                'corequisite' => NULL,
                'antirequisite' => 'HIT1235',
                'minimumCompletedUnits' => '0',
                'maxStudentCount' => 100,
                'lectureGroupCount' => 10,
                'lectureDuration' => '2h',
                'tutorialGroupCount' => 10,
                'tutorialDuration' => '2h',
                'unitInfo' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HIT1235',
                'unitName' => 'Web Programming',
                'prerequisite' => NULL,
                'corequisite' => NULL,
                'antirequisite' => 'HIT1234',
                'minimumCompletedUnits' => '0',
                'maxStudentCount' => 100,
                'lectureGroupCount' => 10,
                'lectureDuration' => '2h',
                'tutorialGroupCount' => 10,
                'tutorialDuration' => '2h',
                'unitInfo' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MGT10001',
                'unitName' => 'Introduction to Management',
                'prerequisite' => NULL,
                'corequisite' => NULL,
                'antirequisite' => NULL,
                'minimumCompletedUnits' => '0',
                'maxStudentCount' => 100,
                'lectureGroupCount' => 10,
                'lectureDuration' => '2h',
                'tutorialGroupCount' => 10,
                'tutorialDuration' => '2h',
                'unitInfo' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ACC10007',
                'unitName' => 'Management Accounting',
                'prerequisite' => NULL,
                'corequisite' => NULL,
                'antirequisite' => NULL,
                'minimumCompletedUnits' => '0',
                'maxStudentCount' => 100,
                'lectureGroupCount' => 10,
                'lectureDuration' => '2h',
                'tutorialGroupCount' => 10,
                'tutorialDuration' => '2h',
                'unitInfo' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ACC10008',
                'unitName' => 'Management Accounting B',
                'prerequisite' => 'ACC10007',
                'corequisite' => NULL,
                'antirequisite' => NULL,
                'minimumCompletedUnits' => '0',
                'maxStudentCount' => 100,
                'lectureGroupCount' => 10,
                'lectureDuration' => '2h',
                'tutorialGroupCount' => 10,
                'tutorialDuration' => '2h',
                'unitInfo' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'UNI20',
                'unitName' => 'A Unit With Many MinimumCompletedUnits',
                'prerequisite' => NULL,
                'corequisite' => NULL,
                'antirequisite' => NULL,
                'minimumCompletedUnits' => '20',
                'maxStudentCount' => 100,
                'lectureGroupCount' => 10,
                'lectureDuration' => '2h',
                'tutorialGroupCount' => 10,
                'tutorialDuration' => '2h',
                'unitInfo' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'UNI2',
                'unitName' => 'A Unit With Few MinimumCompletedUnits',
                'prerequisite' => NULL,
                'corequisite' => NULL,
                'antirequisite' => NULL,
                'minimumCompletedUnits' => '2',
                'maxStudentCount' => 100,
                'lectureGroupCount' => 10,
                'lectureDuration' => '2h',
                'tutorialGroupCount' => 10,
                'tutorialDuration' => '2h',
                'unitInfo' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
