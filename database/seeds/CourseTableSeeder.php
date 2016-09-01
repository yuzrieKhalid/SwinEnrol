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
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'E456',
                'courseName' => 'Engineering',
                'graduationRequirements' => 'None',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'B123',
                'courseName' => 'Business',
                'graduationRequirements' => 'None',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
