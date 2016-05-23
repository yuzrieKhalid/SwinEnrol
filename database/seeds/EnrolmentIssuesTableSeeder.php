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
                'id' => 1,
                'issueType' => 'single_unit',
                'issueMessage' => 'Single Unit of Study',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'issueType' => 'prerequisite',
                'issueMessage' => 'Prerequisite not Fulfilled',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'issueType' => 'timestable_clash',
                'issueMessage' => 'Timestable Clash',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
