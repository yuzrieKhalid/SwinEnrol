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
				'unitType' => 'Study Planner',
				'typeName' => 'Study Planner',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
			[
				'unitType' => 'Unit Listing',
				'typeName' => 'Unit Listing',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			]
		]);
    }
}
