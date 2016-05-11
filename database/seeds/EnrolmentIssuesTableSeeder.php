<?php

use Illuminate\Database\Seeder;

class EnrolmentIssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('enrolment_issues')->insert([
            'studentID' => '5555555',
            'status' => 'pending',
            'details' => 'Single Unit of Study'
        ]);
    }
}
