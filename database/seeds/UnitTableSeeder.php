<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('unit')->insert([
            [
                'unitCode' => 'HIT3315',
                'unitName' => 'LSD',
                'courseCode' => 'I047',
                'core' => 'true',
                'prerequisite' => 'None',
                'corequisite' => 'None',
                'antirequisite' => 'None',
                'minimumCompletedUnits' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HIT3158',
                'unitName' => 'FYP',
                'courseCode' => 'I047',
                'core' => 'true',
                'prerequisite' => 'HIT3315',
                'corequisite' => 'None',
                'antirequisite' => 'None',
                'minimumCompletedUnits' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HIT3310',
                'unitName' => 'Software Architecture and Design',
                'courseCode' => 'I047',
                'core' => 'true',
                'prerequisite' => 'None',
                'corequisite' => 'None',
                'antirequisite' => 'None',
                'minimumCompletedUnits' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MGT10001',
                'unitName' => 'Introduction to Management',
                'courseCode' => 'B123',
                'core' => 'false',
                'prerequisite' => 'None',
                'corequisite' => 'None',
                'antirequisite' => 'None',
                'minimumCompletedUnits' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ACC10007',
                'unitName' => 'Management Accounting',
                'courseCode' => 'B123',
                'core' => 'true',
                'prerequisite' => 'None',
                'corequisite' => 'None',
                'antirequisite' => 'None',
                'minimumCompletedUnits' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
