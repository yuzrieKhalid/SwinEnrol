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
                'username' => 'coordinator_cs',
                'courseCode' => 'I047',
                'name' => 'Sim Kwan Hua'
            ],
            [
                'username' => 'coordinator_fi',
                'courseCode' => 'BA-BUSFIN3',
                'name' => 'Finance Coordinator'
            ],
            [
                'username' => 'coordinator_de',
                'courseCode' => 'BA-MULGD',
                'name' => 'Design Coordinator'
            ]
        ]);
    }
}
