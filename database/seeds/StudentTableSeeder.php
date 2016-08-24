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
                'email' => '4304373@students.swinburne.edu.my',
                'courseCode' => 'I047',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => '4318595',
                'surname' => 'Bin Khalid',
                'givenName' => 'Mohamad Yuzrie',
                'email' => '4318595@students.swinburne.edu.my',
                'courseCode' => 'I047',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => '4315405',
                'surname' => 'Haque',
                'givenName' => 'Sariful',
                'email' => '4315405@students.swinburne.edu.my',
                'courseCode' => 'I047',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
