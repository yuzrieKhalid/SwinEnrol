<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UnitTermTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // *************** Study Planner ***************
        DB::table('unit_term')->insert([
          [
    				'unitType' => 'study_planner',
    				'unitCode' => 'HIT1312',
    				'year' => 2016,
    				'term' => 'Semester 1',
    				'enrolmentTerm' => '1',
            'courseCode' => 'I047',
    				'created_at' => Carbon::now(),
    				'updated_at' => Carbon::now()
    			],
          [
    				'unitType' => 'study_planner',
    				'unitCode' => 'HIT3002',
    				'year' => 2016,
    				'term' => 'Semester 2',
    				'enrolmentTerm' => '2',
            'courseCode' => 'I047',
    				'created_at' => Carbon::now(),
    				'updated_at' => Carbon::now()
    			],
          [
    				'unitType' => 'study_planner',
    				'unitCode' => 'HIT2120',
    				'year' => 2016,
    				'term' => 'Semester 2',
    				'enrolmentTerm' => '5',
            'courseCode' => 'I047',
    				'created_at' => Carbon::now(),
    				'updated_at' => Carbon::now()
    			],
          [
    				'unitType' => 'study_planner',
    				'unitCode' => 'HIT3181',
    				'year' => 2016,
    				'term' => 'Semester 2',
    				'enrolmentTerm' => '2',
            'courseCode' => 'I047',
    				'created_at' => Carbon::now(),
    				'updated_at' => Carbon::now()
    			],
          [
    				'unitType' => 'study_planner',
    				'unitCode' => 'HIT3172',
    				'year' => 2016,
    				'term' => 'Semester 3',
    				'enrolmentTerm' => '3',
            'courseCode' => 'I047',
    				'created_at' => Carbon::now(),
    				'updated_at' => Carbon::now()
    			],
          [
    				'unitType' => 'study_planner',
    				'unitCode' => 'HIT3309',
    				'year' => 2016,
    				'term' => 'Semester 3',
    				'enrolmentTerm' => '0',
            'courseCode' => 'I047',
    				'created_at' => Carbon::now(),
    				'updated_at' => Carbon::now()
    			],
          [
    				'unitType' => 'study_planner',
    				'unitCode' => 'HIT2321',
    				'year' => 2016,
    				'term' => 'Semester 3',
    				'enrolmentTerm' => '0',
            'courseCode' => 'I047',
    				'created_at' => Carbon::now(),
    				'updated_at' => Carbon::now()
    			],
          [
    				'unitType' => 'study_planner',
    				'unitCode' => 'HIT2308',
    				'year' => 2016,
    				'term' => 'Semester 3',
    				'enrolmentTerm' => '3',
            'courseCode' => 'I047',
    				'created_at' => Carbon::now(),
    				'updated_at' => Carbon::now()
    			],
          [
    				'unitType' => 'study_planner',
    				'unitCode' => 'HIT3044',
    				'year' => 2016,
    				'term' => 'Semester 5',
    				'enrolmentTerm' => '1',
            'courseCode' => 'I047',
    				'created_at' => Carbon::now(),
    				'updated_at' => Carbon::now()
    			],
          [
    				'unitType' => 'study_planner',
    				'unitCode' => 'HIT3311',
    				'year' => 2016,
    				'term' => 'Semester 5',
    				'enrolmentTerm' => '5',
            'courseCode' => 'I047',
    				'created_at' => Carbon::now(),
    				'updated_at' => Carbon::now()
    			],
          [
    				'unitType' => 'study_planner',
    				'unitCode' => 'HIT3315',
    				'year' => 2016,
    				'term' => 'Semester 5',
    				'enrolmentTerm' => '0',
            'courseCode' => 'I047',
    				'created_at' => Carbon::now(),
    				'updated_at' => Carbon::now()
    			],
          [
    				'unitType' => 'study_planner',
    				'unitCode' => 'HIT3258',
    				'year' => 2016,
    				'term' => 'Semester 6',
    				'enrolmentTerm' => '0',
            'courseCode' => 'I047',
    				'created_at' => Carbon::now(),
    				'updated_at' => Carbon::now()
    			],
          [
    				'unitType' => 'study_planner',
    				'unitCode' => 'HIT3037',
    				'year' => 2016,
    				'term' => 'Semester 6',
    				'enrolmentTerm' => '0',
            'courseCode' => 'I047',
    				'created_at' => Carbon::now(),
    				'updated_at' => Carbon::now()
    			],
          [
    				'unitType' => 'study_planner',
    				'unitCode' => 'HIT3310',
    				'year' => 2016,
    				'term' => 'Semester 6',
    				'enrolmentTerm' => '0',
            'courseCode' => 'I047',
    				'created_at' => Carbon::now(),
    				'updated_at' => Carbon::now()
    			],
          [
    				'unitType' => 'study_planner',
    				'unitCode' => 'HIT1235',
    				'year' => 2016,
    				'term' => 'Semester 6',
    				'enrolmentTerm' => '0',
            'courseCode' => 'I047',
    				'created_at' => Carbon::now(),
    				'updated_at' => Carbon::now()
    			],

    ////////////////////
          [
    				'unitType' => 'study_planner',
    				'unitCode' => 'HIT1401',
    				'year' => 2016,
    				'term' => 'Semester 1',
    				'enrolmentTerm' => '0',
            'courseCode' => 'I047',
    				'created_at' => Carbon::now(),
    				'updated_at' => Carbon::now()
    			],
          [
    				'unitType' => 'study_planner',
    				'unitCode' => 'HIT2080',
    				'year' => 2016,
    				'term' => 'Semester 1',
    				'enrolmentTerm' => '0',
            'courseCode' => 'I047',
    				'created_at' => Carbon::now(),
    				'updated_at' => Carbon::now()
    			],
          [
    				'unitType' => 'study_planner',
    				'unitCode' => 'HIT1307',
    				'year' => 2016,
    				'term' => 'Semester 2',
    				'enrolmentTerm' => '0',
            'courseCode' => 'I047',
    				'created_at' => Carbon::now(),
    				'updated_at' => Carbon::now()
    			],
          [
    				'unitType' => 'study_planner',
    				'unitCode' => 'HIT1402',
    				'year' => 2016,
    				'term' => 'Semester 3',
    				'enrolmentTerm' => '0',
            'courseCode' => 'I047',
    				'created_at' => Carbon::now(),
    				'updated_at' => Carbon::now()
    			],
          [
    				'unitType' => 'study_planner',
    				'unitCode' => 'HIT2312',
    				'year' => 2016,
    				'term' => 'Semester 4',
    				'enrolmentTerm' => '0',
            'courseCode' => 'I047',
    				'created_at' => Carbon::now(),
    				'updated_at' => Carbon::now()
    			],
          [
    				'unitType' => 'study_planner',
    				'unitCode' => 'HIT2316',
    				'year' => 2016,
    				'term' => 'Semester 5',
    				'enrolmentTerm' => '0',
            'courseCode' => 'I047',
    				'created_at' => Carbon::now(),
    				'updated_at' => Carbon::now()
    			],
            // *************** Unit Listing ***************



      [
				'unitType' => 'unit_listing',
				'unitCode' => 'HIT3315',
				'year' => 2016,
				'term' => 'Semester 1',
				'enrolmentTerm' => 'long',
                'courseCode' => 'I047',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
      [
				'unitType' => 'unit_listing',
				'unitCode' => 'HIT3158',
				'year' => 2016,
				'term' => 'Semester 1',
				'enrolmentTerm' => 'long',
                'courseCode' => 'I047',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
            [
				'unitType' => 'unit_listing',
				'unitCode' => 'MGT10001',
				'year' => 2016,
				'term' => 'Semester 1',
				'enrolmentTerm' => 'long',
                'courseCode' => 'I047',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
            [
				'unitType' => 'unit_listing',
				'unitCode' => 'HIT3158',
				'year' => 2016,
				'term' => 'Semester 1',
				'enrolmentTerm' => 'short',
                'courseCode' => 'I047',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
            [
				'unitType' => 'unit_listing',
				'unitCode' => 'ACC10007',
				'year' => 2016,
				'term' => 'Semester 2',
				'enrolmentTerm' => 'long',
                'courseCode' => 'I047',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
      [
				'unitType' => 'unit_listing',
				'unitCode' => 'ACC10007',
				'year' => 2016,
				'term' => 'Semester 2',
				'enrolmentTerm' => 'short',
                'courseCode' => 'I047',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			]
		]);
    }
}
