<?php

use Illuminate\Database\Seeder;

class CourseCoordinatorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('course_coordinator')->insert([
            [
                'username' => 'coordinator',
                'courseCode' => 'I047',
            ]
        ]);
    }
}
