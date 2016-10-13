<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UnitListingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('unit_listing')->insert([
            [
                'unitCode' => 'HIT1401',
                'year' => 2016,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
                'courseCode' => 'I047',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HIT1312',
                'year' => 2016,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
                'courseCode' => 'I047',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HIT2080',
                'year' => 2016,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
                'courseCode' => 'I047',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HIT1307',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'short',
                'courseCode' => 'I047',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HIT2120',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'courseCode' => 'I047',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HIT3181',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'courseCode' => 'I047',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
            [
                'unitCode' => 'HIT1402',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'courseCode' => 'I047',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
            // *************** Foundation Units ***************
            [
				'unitCode' => 'FO1',
				'year' => 2016,
				'semester' => 'Semester 1',
				'semesterLength' => 'long',
                'courseCode' => 'FICT',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
            [
				'unitCode' => 'FO2',
				'year' => 2016,
				'semester' => 'Semester 1',
				'semesterLength' => 'long',
                'courseCode' => 'FICT',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			]
        ]);
    }
}
