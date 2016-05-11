<?php

use Illuminate\Database\Seeder;

class StudyPlannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('study_planner')->insert([
            [
                'courseCode' => 'I047',
                'unitCode' => 'HIT3315',
                'year' => 2016,
                'term' => '2'
            ],
            [
                'courseCode' => 'I047',
                'unitCode' => 'HIT3158',
                'year' => 2016,
                'term' => '4'
            ],
            [
                'courseCode' => 'B123',
                'unitCode' => 'HIT3315',
                'year' => 2016,
                'term' => '4'
            ]
        ]);
    }
}
