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
                'username' => 'CScience',
                'courseCode' => 'I047',
                'name' => 'Sim Kwan Hua'
            ],
            [
                'username' => 'Finance',
                'courseCode' => 'BA-BUSFIN3',
                'name' => 'Finance Coordinator'
            ],
            [
                'username' => 'Multimedia',
                'courseCode' => 'BA-MULGD',
                'name' => 'Design Coordinator'
            ]
        ]);
    }
}
