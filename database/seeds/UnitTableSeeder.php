<?php

use Illuminate\Database\Seeder;

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
                'minimumCompletedUnits' => '0'
            ],
            [
                'unitCode' => 'HIT3158',
                'unitName' => 'FYP',
                'courseCode' => 'I047',
                'core' => 'true',
                'prerequisite' => 'HIT3315',
                'corequisite' => 'None',
                'antirequisite' => 'None',
                'minimumCompletedUnits' => '0'
            ],
            [
                'unitCode' => 'ACC10007',
                'unitName' => 'Management Accounting',
                'courseCode' => 'B123',
                'core' => 'true',
                'prerequisite' => 'None',
                'corequisite' => 'None',
                'antirequisite' => 'None',
                'minimumCompletedUnits' => '0'
            ]
        ]);
    }
}
