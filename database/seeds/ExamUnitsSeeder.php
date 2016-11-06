<?php

use Illuminate\Database\Seeder;

class ExamUnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('eduversal')->table('exam_units')->insert([
            [
                'studentID' => '4318595',
                'unitCode' => 'COS10009',
                'grade' => 'fail',
            ],
            [
                'studentID' => '4318595',
                'unitCode' => 'COS10003',
                'grade' => 'pass',
            ],
            [
                'studentID' => '4304373',
                'unitCode' => 'COS10009',
                'grade' => 'fail',
            ],
            [
                'studentID' => '4304373',
                'unitCode' => 'COS10004',
                'grade' => 'pass',
            ],
            [
                'studentID' => '4315405',
                'unitCode' => 'COS10011',
                'grade' => 'pass',
            ]
        ]);
    }
}
