<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StudentEnrolmentIssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('student_enrolment_issues')->insert([
			[
				'studentID' => '4318595',
				'issueID' => 1,
				'status' => 'pending',
                'submissionData' => 'supposed to receive/store a json array',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
			[
				'studentID' => '4318595',
				'issueID' => 3,
				'status' => 'pending',
                'submissionData' => 'supposed to receive/store a json array',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			]
		]);
    }
}
