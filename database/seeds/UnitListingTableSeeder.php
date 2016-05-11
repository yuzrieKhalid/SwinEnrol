<?php

use Illuminate\Database\Seeder;

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
                'unitCode' => 'HIT3315'
            ],
            [
                'year' => 2016,
                'term' => '2',
                'unitCode' => 'HIT3158'
            ],
            [
                'year' => 2016,
                'term' => '4',
                'unitCode' => 'HIT3158'
            ],
            [
                'year' => 2016,
                'term' => '4',
                'unitCode' => 'ACC10007'
            ]
        ]);
    }
}
