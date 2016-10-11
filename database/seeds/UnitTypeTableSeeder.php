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
                'unitType' => 'Core',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'Major',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'Co-Major',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'Minor',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'Elective',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
		]);
    }
}
