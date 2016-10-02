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
                'studentID' => 'student',
                'unitCode' => 'HIT1401',
                'grade' => 'pass',
            ],
            [
                'studentID' => 'student',
                'unitCode' => 'HIT1312',
                'grade' => 'pass',
            ],
            [
                'studentID' => 'student',
                'unitCode' => 'HIT2080',
                'grade' => 'fail',
            ]
        ]);
    }
}
