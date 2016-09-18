<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('config')->insert([
            // enrolmentPhase: range between 1-8
            [
                'id' => 'enrolmentPhase',
                'value' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // semester: values are 'Semester 1', 'Semester 2'
            [
                'id' => 'semester',
                'value' => 'Semester 1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 'year',
                'value' => '2016',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // semesterLength: number of semesters
            // todo: rename to semesterCount which determines semesters per year and create yearCount for years of study
            // note: check parsing of unitTerm to make sure it doesn't break
            [
                'id' => 'semesterLength',
                'value' => '9',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // approvalShort: number of days before commencement(short semester) to approve units
            [
                'id' => 'approvalShort',
                'value' => '14',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // addCloseShort: number of days after commencement(short semester) when add period closes
            [
                'id' => 'addCloseShort',
                'value' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // dropCloseShort: number of days after commencement(short semester) when drop period closes
            [
                'id' => 'dropCloseShort',
                'value' => '12',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // approvalLong: number of days before commencement(long semester) to approve units
            [
                'id' => 'approvalLong',
                'value' => '14',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // addCloseLong: number of days after commencement(long semester) when add period closes
            [
                'id' => 'addCloseLong',
                'value' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // dropCloseLong: number of days after commencement(long semester) when drop period closes
            [
                'id' => 'dropCloseLong',
                'value' => '26',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
