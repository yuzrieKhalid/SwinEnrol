<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StudentRecordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('eduversal')->table('student_records')->insert([
            [
                'studentID' => '4304373',
                'surname' => 'Thomas Chew',
                'givenName' => 'Jason',
                'dateOfBirth' => '123456',
                'courseCode' => 'I047',
                'year' => 2016,
                'term' => 'Semester 1',
                'paymentStatus' => 'paid',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => '4318595',
                'surname' => 'Bin Khalid',
                'givenName' => 'Mohamad Yuzrie',
                'dateOfBirth' => '123456',
                'courseCode' => 'I047',
                'year' => 2016,
                'term' => 'Semester 1',
                'paymentStatus' => 'paid',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => '4315405',
                'surname' => 'Haque',
                'givenName' => 'Sariful',
                'dateOfBirth' => '123456',
                'courseCode' => 'I047',
                'year' => 2016,
                'term' => 'Semester 1',
                'paymentStatus' => 'paid',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => 'student',
                'surname' => 'name',
                'givenName' => 'student',
                'dateOfBirth' => '123456',
                'courseCode' => 'I047',
                'year' => 2016,
                'term' => 'Semester 1',
                'paymentStatus' => 'paid',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => 'articulate',
                'surname' => 'student',
                'givenName' => 'articulating',
                'dateOfBirth' => '123456',
                'courseCode' => 'FICT',
                'year' => 2016,
                'term' => 'Semester 1',
                'paymentStatus' => 'paid',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => 'articulatefail',
                'surname' => 'fail',
                'givenName' => 'articulate',
                'dateOfBirth' => '123456',
                'courseCode' => 'FICT',
                'year' => 2016,
                'term' => 'Semester 1',
                'paymentStatus' => 'paid',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => 'student2',
                'surname' => 'New 2',
                'givenName' => 'Student 2',
                'dateOfBirth' => '123456',
                'courseCode' => 'I047',
                'year' => 2016,
                'term' => 'Semester 1',
                'paymentStatus' => 'unpaid',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => 'student3',
                'surname' => 'New 3',
                'givenName' => 'Student 3',
                'dateOfBirth' => '123456',
                'courseCode' => 'BA-MULGD',
                'year' => 2016,
                'term' => 'Semester 1',
                'paymentStatus' => 'paid',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => 'student4',
                'surname' => 'New 4',
                'givenName' => 'Student 4',
                'dateOfBirth' => '123456',
                'courseCode' => 'BA-BUSFIN3',
                'year' => 2016,
                'term' => 'Semester 1',
                'paymentStatus' => 'paid',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
