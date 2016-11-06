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
                'username' => 'I047',
                'courseCode' => 'I047',
                'name' => 'Sim Kwan Hua'
            ],
            [
                'username' => 'BUSFIN3',
                'courseCode' => 'BA-BUSFIN3',
                'name' => 'Finance Coordinator'
            ],
            [
                'username' => 'MULGD',
                'courseCode' => 'BA-MULGD',
                'name' => 'Design Coordinator'
            ]
        ]);
    }
}
