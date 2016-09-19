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
                'courseCode' => 'I047',
                'unitCode' => 'HIT2080',
                'year' => 2016,
                'term' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'I047',
                'unitCode' => 'HIT1307',
                'year' => 2016,
                'term' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'I047',
                'unitCode' => 'HIT2312',
                'year' => 2016,
                'term' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'I047',
                'unitCode' => 'HIT2316',
                'year' => 2016,
                'term' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'I047',
                'unitCode' => 'HIT3044',
                'year' => 2016,
                'term' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'I047',
                'unitCode' => 'HIT3002',
                'year' => 2016,
                'term' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'I047',
                'unitCode' => 'HIT3037',
                'year' => 2016,
                'term' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'I047',
                'unitCode' => 'HIT3310',
                'year' => 2016,
                'term' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'I047',
                'unitCode' => 'HIT2316',
                'year' => 2016,
                'term' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'I047',
                'unitCode' => 'HIT3309',
                'year' => 2016,
                'term' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'I047',
                'unitCode' => 'HIT1312',
                'year' => 2016,
                'term' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'I047',
                'unitCode' => 'HIT3181',
                'year' => 2016,
                'term' => '6',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'I047',
                'unitCode' => 'HIT3172',
                'year' => 2016,
                'term' => '6',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'courseCode' => 'I047',
                'unitCode' => 'HIT3311',
                'year' => 2016,
                'term' => '6',
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
