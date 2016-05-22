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
                'year' => 2016,
                'term' => '2',
                'unitCode' => 'HIT3315',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'year' => 2016,
                'term' => '2',
                'unitCode' => 'HIT3158',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'year' => 2016,
                'term' => '2',
                'unitCode' => 'MGT10001',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'year' => 2016,
                'term' => '4',
                'unitCode' => 'HIT3158',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'year' => 2016,
                'term' => '4',
                'unitCode' => 'ACC10007',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
