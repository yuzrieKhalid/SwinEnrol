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
                "studentID" => "4318595",
                "issueID" => 1,
                "status" => "pending",
                "submissionData" => "{\"yearOfRequestedTransfer\":\"2016\",\"fromProgramCode\":\"I047\",\"fromProgramTitle\":\"Bachelor of Computer Science\",\"fromProgramIntakeYear\":\"2016\",\"toProgramCode\":\"B123\",\"toProgramTitle\":\"Business\",\"toProgramYear\":\"2016\",\"toReasons\":\"Sample to go Business\"}",
                "attachmentData" => "",
                "created_at"=> Carbon::now(),
                "updated_at"=> Carbon::now()
            ],
            [
                "studentID" => "4318595",
                "issueID" => 2,
                "status" => "pending",
                "submissionData" => "{\"fromProgramCode\":\"I047\",\"fromProgramTitle\":\"Bachelor of Computer Science\",\"exemptionUnitCode\":\"HIT 1001\",\"exemptionUnitYear\":\"2016\",\"exemptionUnitTitle\":\"Introduction to Testing\"}",
                "attachmentData" => "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",
                "created_at"=> Carbon::now(),
                "updated_at"=> Carbon::now()
            ],
            [
                "studentID" => "4318595",
                "issueID" => 3,
                "status" => "pending",
                "submissionData" => "{\"fromProgramCode\":\"I047\",\"fromProgramTitle\":\"Bachelor of Computer Science\",\"isForeigner\":\"YES\",\"iso_name\":\"Sariful\",\"teachingPeriod\":\"Semester 2\",\"year\":\"2016\",\"reasonForLOA\":\"For fun\"}",
                "attachmentData" => "",
                "created_at"=> Carbon::now(),
                "updated_at"=> Carbon::now()
            ],
            [
                "studentID" => "4318595",
                "issueID" => 4,
                "status" => "pending",
                "submissionData" => "{\"fromProgramCode\":\"I047\",\"fromProgramTitle\":\"Bachelor of Computer Science\",\"studentID\":\"4318595\",\"surname\":\"Bin Khalid\",\"given_name\":\"Mohamad Yuzrie\",\"year\":\"2016\",\"semester\":\"1\"}",
                "attachmentData" => "",
                "created_at"=> Carbon::now(),
                "updated_at"=> Carbon::now()
            ]
		]);
    }
}
