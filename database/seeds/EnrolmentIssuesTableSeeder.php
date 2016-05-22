<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            [
                'studentID' => '5555555',
                'issueType' => 'single_unit',
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'studentID' => '4304373',
                'issueType' => 'timestable_clash',
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
