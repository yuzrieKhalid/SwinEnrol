<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RequisiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('requisite')->insert([
            // test units
            [
                'unitCode' => 'PRE0',
                'requisite' => 'COMP',
                'type' => 'prerequisite',
                'conjunction' => 'AND',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'PRE1',
                'requisite' => 'GEN1',
                'type' => 'prerequisite',
                'conjunction' => 'AND',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COR0',
                'requisite' => 'GEN0',
                'type' => 'corequisite',
                'conjunction' => 'AND',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COR1',
                'requisite' => 'GEN1',
                'type' => 'corequisite',
                'conjunction' => 'AND',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ANTI0',
                'requisite' => 'GEN1',
                'type' => 'antirequisite',
                'conjunction' => 'AND',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ANTI1',
                'requisite' => 'COMP',
                'type' => 'antirequisite',
                'conjunction' => 'AND',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // BCS units
            [
                'unitCode' => 'HIT3158',
                'requisite' => 'HIT3315',
                'type' => 'prerequisite',
                'conjunction' => 'AND',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ACC10008',
                'requisite' => 'ACC10007',
                'type' => 'prerequisite',
                'conjunction' => 'AND',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HIT3172',
                'requisite' => 'HIT3181',
                'type' => 'prerequisite',
                'conjunction' => 'AND',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HIT3181',
                'requisite' => 'HIT2080',
                'type' => 'prerequisite',
                'conjunction' => 'AND',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HIT3309',
                'requisite' => 'HIT3181',
                'type' => 'prerequisite',
                'conjunction' => 'AND',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HIT2312',
                'requisite' => 'HIT1312',
                'type' => 'prerequisite',
                'conjunction' => 'AND',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HIT2308',
                'requisite' => 'HIT3181',
                'type' => 'prerequisite',
                'conjunction' => 'AND',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HIT3311',
                'requisite' => 'HIT3309',
                'type' => 'prerequisite',
                'conjunction' => 'AND',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HIT3258',
                'requisite' => 'HIT3158',
                'type' => 'prerequisite',
                'conjunction' => 'AND',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HIT3002',
                'requisite' => 'HIT3172',
                'type' => 'prerequisite',
                'conjunction' => 'AND',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HIT3037',
                'requisite' => 'HIT3172',
                'type' => 'prerequisite',
                'conjunction' => 'AND',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
