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
        //
        DB::table('unit_term')->insert([
			[
				'unitType' => 'Study Planner',
				'unitCode' => 'ACC10007',
				'year' => 2016,
				'term' => 'Semester 1',
				'enrolmentTerm' => '1',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
            [
				'unitType' => 'Study Planner',
				'unitCode' => 'HIT3158',
				'year' => 2016,
				'term' => 'Semester 1',
				'enrolmentTerm' => '2',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
            [
				'unitType' => 'Study Planner',
				'unitCode' => 'HIT3310',
				'year' => 2016,
				'term' => 'Semester 1',
				'enrolmentTerm' => '3',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
            [
				'unitType' => 'Study Planner',
				'unitCode' => 'HIT3315',
				'year' => 2016,
				'term' => 'Semester 1',
				'enrolmentTerm' => '4',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
            [
				'unitType' => 'Study Planner',
				'unitCode' => 'MGT10001',
				'year' => 2016,
				'term' => 'Semester 1',
				'enrolmentTerm' => '5',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
            [
				'unitType' => 'Study Planner',
				'unitCode' => 'MGT10001',
				'year' => 2016,
				'term' => 'Semester 1',
				'enrolmentTerm' => '5',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
            [
				'unitType' => 'Study Planner',
				'unitCode' => 'HIT3158',
				'year' => 2016,
				'term' => 'Semester 1',
				'enrolmentTerm' => '5',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
            [
				'unitType' => 'Study Planner',
				'unitCode' => 'HIT3310',
				'year' => 2016,
				'term' => 'Semester 1',
				'enrolmentTerm' => '6',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
            [
				'unitType' => 'Study Planner',
				'unitCode' => 'HIT3158',
				'year' => 2016,
				'term' => 'Semester 2',
				'enrolmentTerm' => '1',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
            [
				'unitType' => 'Study Planner',
				'unitCode' => 'MGT10001',
				'year' => 2016,
				'term' => 'Semester 2',
				'enrolmentTerm' => '1',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
            [
				'unitType' => 'Study Planner',
				'unitCode' => 'HIT3315',
				'year' => 2016,
				'term' => 'Semester 2',
				'enrolmentTerm' => '1',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
            // ******************************
            [
				'unitType' => 'Unit Listing',
				'unitCode' => 'HIT3315',
				'year' => 2016,
				'term' => 'Semester 1',
				'enrolmentTerm' => '0',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
            [
				'unitType' => 'Unit Listing',
				'unitCode' => 'HIT3158',
				'year' => 2016,
				'term' => 'Semester 1',
				'enrolmentTerm' => '0',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
            [
				'unitType' => 'Unit Listing',
				'unitCode' => 'MGT10001',
				'year' => 2016,
				'term' => 'Semester 1',
				'enrolmentTerm' => '0',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
            [
				'unitType' => 'Unit Listing',
				'unitCode' => 'HIT3158',
				'year' => 2016,
				'term' => 'Semester 2',
				'enrolmentTerm' => '0',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
            [
				'unitType' => 'Unit Listing',
				'unitCode' => 'ACC10007',
				'year' => 2016,
				'term' => 'Semester 2',
				'enrolmentTerm' => '0',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			]
		]);
    }
}
