<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('student')->insert([
            [
                'studentID' => '4304373',
                'surname' => 'Thomas Chew',
                'givenName' => 'Jason',
                'concededPass' => 0,
                'courseCode' => 'I047',
                'year' => 2016,
                'term' => 'Semester 1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => '4318595',
                'surname' => 'Bin Khalid',
                'givenName' => 'Mohamad Yuzrie',
                'concededPass' => 0,
                'courseCode' => 'I047',
                'year' => 2016,
                'term' => 'Semester 1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => '4315405',
                'surname' => 'Haque',
                'givenName' => 'Sariful',
                'concededPass' => 0,
                'courseCode' => 'I047',
                'year' => 2016,
                'term' => 'Semester 1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => 'student',
                'surname' => 'name',
                'givenName' => 'student',
                'concededPass' => 0,
                'courseCode' => 'I047',
                'year' => 2016,
                'term' => 'Semester 1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
