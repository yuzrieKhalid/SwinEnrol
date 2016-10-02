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
                'graduationRequirements' => 'None',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'BA-BUSFIN3',
                'courseName' => 'Bachelor of Business (Finance)',
                'graduationRequirements' => 'None',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'SK401',
                'courseName' => 'Bachelor of Engineering (Chemical) (Honours)',
                'graduationRequirements' => 'None',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'BA-MULGD',
                'courseName' => 'Bachelor of Design (Graphic Design)',
                'graduationRequirements' => 'None',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'BA-SCBIO2',
                'courseName' => 'Bachelor of Science (Biotechnology)',
                'graduationRequirements' => 'None',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // etc
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
