<?php

use Illuminate\Database\Seeder;

class InternalCourseTransferTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('internal_course_transfer')->insert([
            'studentID' => '4304373',
            'courseCode' => 'B123',
            'comment' => 'You Only Live Once'
        ]);
    }
}
