<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UnitTermTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // *************** Study Planner ***************
        DB::table('unit_term')->insert([
            // BCS
            // Year 1 Sem 1
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HIT1401',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '0',
                'courseCode' => 'I047',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HIT1312',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '0',
                'courseCode' => 'I047',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HIT2080',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '0',
                'courseCode' => 'I047',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Year 1 Sem 2
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HIT1307',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '1',
                'courseCode' => 'I047',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Year 1 Sem 3
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HIT2120',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '2',
                'courseCode' => 'I047',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HIT3181',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '2',
                'courseCode' => 'I047',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HIT1402',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '2',
                'courseCode' => 'I047',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Year 2 Sem 1
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HIT3172',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '3',
                'courseCode' => 'I047',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HIT3309',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '3',
                'courseCode' => 'I047',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HIT2312',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '3',
                'courseCode' => 'I047',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Year 2 Sem 2
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HIT2308',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '4',
                'courseCode' => 'I047',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HIT2316',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '4',
                'courseCode' => 'I047',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Year 2 Sem 3
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HIT3044',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '5',
                'courseCode' => 'I047',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HIT3311',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '5',
                'courseCode' => 'I047',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HIT3158',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '5',
                'courseCode' => 'I047',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HIT3310',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '5',
                'courseCode' => 'I047',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Year 3 Sem 1
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HIT3315',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '6',
                'courseCode' => 'I047',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HIT3258',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '6',
                'courseCode' => 'I047',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HIT3002',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '6',
                'courseCode' => 'I047',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HIT3037',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '6',
                'courseCode' => 'I047',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Bachelor of Business (Finance)
            [
                'unitType' => 'study_planner',
                'unitCode' => 'MGT10001',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '1',
                'courseCode' => 'BA-BUSFIN3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'LAW10004',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '1',
                'courseCode' => 'BA-BUSFIN3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'COM10007',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '1',
                'courseCode' => 'BA-BUSFIN3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'ECO10002',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '1',
                'courseCode' => 'BA-BUSFIN3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'ACC10007',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '2',
                'courseCode' => 'BA-BUSFIN3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'ECO10003',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '2',
                'courseCode' => 'BA-BUSFIN3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'FIN10002',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '3',
                'courseCode' => 'BA-BUSFIN3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'FIN20012',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '3',
                'courseCode' => 'BA-BUSFIN3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'FIN20014',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '4',
                'courseCode' => 'BA-BUSFIN3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'FIN20013',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '4',
                'courseCode' => 'BA-BUSFIN3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'BUS30010',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '5',
                'courseCode' => 'BA-BUSFIN3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'FIN30014',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '5',
                'courseCode' => 'BA-BUSFIN3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'FIN30016',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '5',
                'courseCode' => 'BA-BUSFIN3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'BUS30009',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '6',
                'courseCode' => 'BA-BUSFIN3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'FIN30015',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '6',
                'courseCode' => 'BA-BUSFIN3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'ENT30010',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '6',
                'courseCode' => 'BA-BUSFIN3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Bachelor of Engineering (Chemical)
            [
                'unitType' => 'study_planner',
                'unitCode' => 'CVE10002',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '1',
                'courseCode' => 'SK401',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'MEE10001',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '1',
                'courseCode' => 'SK401',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'CHE10001',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '1',
                'courseCode' => 'SK401',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'MTH10006',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '1',
                'courseCode' => 'SK401',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HEC1221',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '2',
                'courseCode' => 'SK401',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'PHY10001',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '2',
                'courseCode' => 'SK401',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'CHE10002',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '2',
                'courseCode' => 'SK401',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'MTH10007',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '2',
                'courseCode' => 'SK401',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'EEE10001',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '3',
                'courseCode' => 'SK401',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HEC2411',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '3',
                'courseCode' => 'SK401',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HEC2421',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '3',
                'courseCode' => 'SK401',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HEC2322',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '3',
                'courseCode' => 'SK401',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'MEE20002',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '4',
                'courseCode' => 'SK401',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HEC2311',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '4',
                'courseCode' => 'SK401',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'MTH20007',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '4',
                'courseCode' => 'SK401',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HEC3521',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '4',
                'courseCode' => 'SK401',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HEC3651',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '5',
                'courseCode' => 'SK401',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HEC3514',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '5',
                'courseCode' => 'SK401',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HEC2412',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '5',
                'courseCode' => 'SK401',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'MME30001',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '5',
                'courseCode' => 'SK401',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HEC3622',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '6',
                'courseCode' => 'SK401',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HEC3523',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '6',
                'courseCode' => 'SK401',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HEC3512',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '6',
                'courseCode' => 'SK401',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HEC4842',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '6',
                'courseCode' => 'SK401',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HEC4771',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '7',
                'courseCode' => 'SK401',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HEC4745',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '7',
                'courseCode' => 'SK401',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HEC3612',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '7',
                'courseCode' => 'SK401',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HEC4722',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '7',
                'courseCode' => 'SK401',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HEC4873',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '8',
                'courseCode' => 'SK401',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HEC4746',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '8',
                'courseCode' => 'SK401',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'HEC4824',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '8',
                'courseCode' => 'SK401',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'study_planner',
                'unitCode' => 'MME40001',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => '8',
                'courseCode' => 'SK401',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // *************** Unit Listing ***************
            [
                'unitType' => 'unit_listing',
                'unitCode' => 'HIT1401',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => 'long',
                'courseCode' => 'I047',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'unit_listing',
                'unitCode' => 'HIT1312',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => 'long',
                'courseCode' => 'I047',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'unit_listing',
                'unitCode' => 'HIT2080',
                'year' => 2016,
                'term' => 'Semester 1',
                'enrolmentTerm' => 'long',
                'courseCode' => 'I047',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'unit_listing',
                'unitCode' => 'HIT1307',
                'year' => 2016,
                'term' => 'Semester 2',
                'enrolmentTerm' => 'short',
                'courseCode' => 'I047',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'unit_listing',
                'unitCode' => 'HIT2120',
                'year' => 2016,
                'term' => 'Semester 2',
                'enrolmentTerm' => 'long',
                'courseCode' => 'I047',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitType' => 'unit_listing',
                'unitCode' => 'HIT3181',
                'year' => 2016,
                'term' => 'Semester 2',
                'enrolmentTerm' => 'long',
                'courseCode' => 'I047',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
            [
                'unitType' => 'unit_listing',
                'unitCode' => 'HIT1402',
                'year' => 2016,
                'term' => 'Semester 2',
                'enrolmentTerm' => 'long',
                'courseCode' => 'I047',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
            // *************** Foundation Units ***************
            [
				'unitType' => 'unit_listing',
				'unitCode' => 'FO1',
				'year' => 2016,
				'term' => 'Semester 1',
				'enrolmentTerm' => 'long',
                'courseCode' => 'FICT',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
            [
				'unitType' => 'unit_listing',
				'unitCode' => 'FO2',
				'year' => 2016,
				'term' => 'Semester 1',
				'enrolmentTerm' => 'long',
                'courseCode' => 'FICT',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			]
		]);
    }
}
