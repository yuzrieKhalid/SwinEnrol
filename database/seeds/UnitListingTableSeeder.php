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
                'unitCode' => 'COS10009',
                'year' => 2016,
                'semester' => 'Semester 1',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
