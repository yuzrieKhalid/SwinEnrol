<?php

use Illuminate\Database\Seeder;

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
                'graduationRequirements' => 'None'
            ],
            [
                'courseCode' => 'B123',
                'courseName' => 'Business',
                'graduationRequirements' => 'None'
            ]
        ]);
    }
}
