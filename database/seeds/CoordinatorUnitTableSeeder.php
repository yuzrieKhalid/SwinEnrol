<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CoordinatorUnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('coordinator_units')->insert([
            [
                'username' => 'ComputerScience',
                'unitCode' => 'COS10009',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
