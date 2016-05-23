<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            'studentID' => '4318595',
            'courseCode' => 'B123',
            'comment' => 'Interested in Business',
            'status' => 'pending',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
