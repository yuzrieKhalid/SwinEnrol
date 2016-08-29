<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UnitTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('unit_type')->insert([
			[
				'unitType' => 'study_planner',
				'typeName' => 'Study Planner',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
			[
				'unitType' => 'unit_listing',
				'typeName' => 'Unit Listing',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			]
		]);
    }
}
