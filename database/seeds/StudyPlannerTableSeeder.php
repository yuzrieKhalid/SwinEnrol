<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
                'term' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'I047',
                'unitCode' => 'HIT3158',
                'year' => 2016,
                'term' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'B123',
                'unitCode' => 'MGT10001',
                'year' => 2016,
                'term' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'B123',
                'unitCode' => 'HIT3315',
                'year' => 2016,
                'term' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
