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
                'unitCode' => 'PRG0',
                'requisite' => 'COMPA',
                'type' => 'prerequisite 2',
                'index' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'PRG0',
                'requisite' => 'COMPB',
                'type' => 'prerequisite 2',
                'index' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'PRG0',
                'requisite' => 'GEN1',
                'type' => 'prerequisite 2',
                'index' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'PRG1',
                'requisite' => 'COMP',
                'type' => 'prerequisite 3',
                'index' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'PRG1',
                'requisite' => 'COMPA',
                'type' => 'prerequisite 3',
                'index' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'PRG1',
                'requisite' => 'GEN1',
                'type' => 'prerequisite 3',
                'index' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'PRG1',
                'requisite' => 'GEN1',
                'type' => 'prerequisite 3',
                'index' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'PRE10',
                'requisite' => 'COMP',
                'type' => 'prerequisite',
                'index' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'PRE10',
                'requisite' => 'GEN1',
                'type' => 'prerequisite',
                'index' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'PRE10',
                'requisite' => 'COMPB',
                'type' => 'prerequisite',
                'index' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'PRE10',
                'requisite' => 'COMPC',
                'type' => 'prerequisite',
                'index' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'PRE11',
                'requisite' => 'GEN1',
                'type' => 'prerequisite',
                'index' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'PRE11',
                'requisite' => 'GEN1',
                'type' => 'prerequisite',
                'index' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'PRE11',
                'requisite' => 'GEN1',
                'type' => 'prerequisite',
                'index' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'PRE11',
                'requisite' => 'COMPB',
                'type' => 'prerequisite',
                'index' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'PRE11',
                'requisite' => 'COMPC',
                'type' => 'prerequisite',
                'index' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'PRE0',
                'requisite' => 'COMP',
                'type' => 'prerequisite',
                'index' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'PRE1',
                'requisite' => 'GEN1',
                'type' => 'prerequisite',
                'index' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COR0',
                'requisite' => 'GEN0',
                'type' => 'corequisite',
                'index' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COR1',
                'requisite' => 'GEN1',
                'type' => 'corequisite',
                'index' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ANTI0',
                'requisite' => 'GEN1',
                'type' => 'antirequisite',
                'index' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ANTI1',
                'requisite' => 'COMP',
                'type' => 'antirequisite',
                'index' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // BCS units
            [
                'unitCode' => 'ACC10008',
                'requisite' => 'ACC10007',
                'type' => 'prerequisite',
                'index' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COS20007',
                'requisite' => 'COS10009',
                'type' => 'prerequisite',
                'index' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COS10011',
                'requisite' => 'COS10009',
                'type' => 'prerequisite',
                'index' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COS20015',
                'requisite' => 'COS10009',
                'type' => 'prerequisite',
                'index' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COS10004',
                'requisite' => 'COS10003',
                'type' => 'prerequisite',
                'index' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'SWE20001',
                'requisite' => 'COS20007',
                'type' => 'prerequisite',
                'index' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COS30008',
                'requisite' => 'COS20007',
                'type' => 'prerequisite',
                'index' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COS30043',
                'requisite' => 'COS20007',
                'type' => 'prerequisite',
                'index' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'SWE40002',
                'requisite' => 'SWE40001',
                'type' => 'prerequisite',
                'index' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
            // Bachelor of Business (Finance)

        ]);
    }
}
