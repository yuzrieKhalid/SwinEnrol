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
                'courseName' => 'BCS',
                'graduationRequirements' => 'None',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'E456',
                'courseName' => 'Engineering',
                'graduationRequirements' => 'None',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'B123',
                'courseName' => 'Business',
                'graduationRequirements' => 'None',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'FICT',
                'courseName' => 'Foundation (ICT)',
                'graduationRequirements' => 'None',
                'studyLevel' => 'Foundation',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
