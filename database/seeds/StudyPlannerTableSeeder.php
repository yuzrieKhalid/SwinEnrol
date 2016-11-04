<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;



class StudyPlannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('study_planner')->insert([
            // Bachelor of Computer Science
            // Year 1 Sem 1
            [
                'unitCode' => 'COS10009',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COS10003',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COS10011',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'COS20001',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Year 1 Sem 2
            [
                'unitCode' => 'COS30023',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Year 1 Sem 3
            [
                'unitCode' => 'COS20015',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COS20007',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COS10004',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'SWE20001',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Year 2 Sem 1
            [
                'unitCode' => 'COS30008',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COS30043',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'SWE40001',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'SWE30010',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Year 2 Sem 2
            [
                'unitCode' => 'SWE30009',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COS30016',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Year 2 Sem 3
            [
                'unitCode' => 'SWE40002',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COS30017',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Year 3 Sem 1
            [
                'unitCode' => 'ICT30005',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '6',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COS30041',
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '6',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Bachelor of Business (Finance)
            [
                'unitCode' => 'MGT10001',
                'courseCode' => 'BA-BUSFIN3',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'LAW10004',
                'courseCode' => 'BA-BUSFIN3',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COM10007',
                'courseCode' => 'BA-BUSFIN3',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ECO10002',
                'courseCode' => 'BA-BUSFIN3',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ACC10007',
                'courseCode' => 'BA-BUSFIN3',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ECO10003',
                'courseCode' => 'BA-BUSFIN3',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'FIN10002',
                'courseCode' => 'BA-BUSFIN3',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'FIN20012',
                'courseCode' => 'BA-BUSFIN3',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'FIN20014',
                'courseCode' => 'BA-BUSFIN3',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'FIN20013',
                'courseCode' => 'BA-BUSFIN3',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BUS30010',
                'courseCode' => 'BA-BUSFIN3',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '6',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'FIN30014',
                'courseCode' => 'BA-BUSFIN3',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '6',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'FIN30016',
                'courseCode' => 'BA-BUSFIN3',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '6',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BUS30009',
                'courseCode' => 'BA-BUSFIN3',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '7',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'FIN30015',
                'courseCode' => 'BA-BUSFIN3',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '7',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ENT30010',
                'courseCode' => 'BA-BUSFIN3',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '7',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Bachelor of Engineering (Chemical)
			/////*******************************

			/////*******************************
            [
                'unitCode' => 'CVE10002',
                'courseCode' => 'SK401',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MEE10001',
                'courseCode' => 'SK401',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CHE10001',
                'courseCode' => 'SK401',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MTH10006',
                'courseCode' => 'SK401',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            //////
            [
                'unitCode' => 'HEC1221',
                'courseCode' => 'SK401',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'PHY10001',
                'courseCode' => 'SK401',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CHE10002',
                'courseCode' => 'SK401',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MTH10007',
                'courseCode' => 'SK401',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            //////
            [
                'unitCode' => 'EEE10001',
                'courseCode' => 'SK401',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC2411',
                'courseCode' => 'SK401',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC2421',
                'courseCode' => 'SK401',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC2322',
                'courseCode' => 'SK401',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            //////
            [
                'unitCode' => 'MEE20002',
                'courseCode' => 'SK401',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC2311',
                'courseCode' => 'SK401',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MTH20007',
                'courseCode' => 'SK401',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC3521',
                'courseCode' => 'SK401',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            //////
            [
                'unitCode' => 'HEC3651',
                'courseCode' => 'SK401',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC3514',
                'courseCode' => 'SK401',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC2412',
                'courseCode' => 'SK401',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MME30001',
                'courseCode' => 'SK401',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            ////
            [
                'unitCode' => 'HEC3622',
                'courseCode' => 'SK401',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC3523',
                'courseCode' => 'SK401',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC3512',
                'courseCode' => 'SK401',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC4842',
                'courseCode' => 'SK401',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            //////
            [
                'unitCode' => 'HEC4771',
                'courseCode' => 'SK401',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '6',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC4745',
                'courseCode' => 'SK401',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '6',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC3612',
                'courseCode' => 'SK401',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '6',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC4722',
                'courseCode' => 'SK401',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '6',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            //////
            [
                'unitCode' => 'HEC4873',
                'courseCode' => 'SK401',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 2',
                'enrolmentTerm' => '7',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC4746',
                'courseCode' => 'SK401',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 2',
                'enrolmentTerm' => '7',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC4824',
                'courseCode' => 'SK401',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 2',
                'enrolmentTerm' => '7',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MME40001',
                'courseCode' => 'SK401',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 2',
                'enrolmentTerm' => '7',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Bachelor of Design (Graphic Design)
          /////*******************************
          /////*******************************
          /////*******************************
          [
              'unitCode' => 'HDC001',
              'courseCode' => 'BA-MULGD',
              'unitType' => 'Core',
              'year' => 2016,
              'semester' => 'Semester 1',
              'enrolmentTerm' => '0',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now()
          ],
          [
              'unitCode' => 'HDC002',
              'courseCode' => 'BA-MULGD',
              'unitType' => 'Core',
              'year' => 2016,
              'semester' => 'Semester 1',
              'enrolmentTerm' => '0',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now()
          ],
          [
              'unitCode' => 'HDC003',
              'courseCode' => 'BA-MULGD',
              'unitType' => 'Core',
              'year' => 2016,
              'semester' => 'Semester 1',
              'enrolmentTerm' => '0',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now()
          ],
          [
              'unitCode' => 'HDC004',
              'courseCode' => 'BA-MULGD',
              'unitType' => 'Core',
              'year' => 2016,
              'semester' => 'Semester 1',
              'enrolmentTerm' => '0',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now()
          ],
          [
                'unitCode' => 'HDCOM111',
                'courseCode' => 'BA-MULGD',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM112',
                'courseCode' => 'BA-MULGD',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM121',
                'courseCode' => 'BA-MULGD',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM122',
                'courseCode' => 'BA-MULGD',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM211',
                'courseCode' => 'BA-MULGD',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            /////

            [
                'unitCode' => 'HDCOM212',
                'courseCode' => 'BA-MULGD',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM221',
                'courseCode' => 'BA-MULGD',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDC005',
                'courseCode' => 'BA-MULGD',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM311',
                'courseCode' => 'BA-MULGD',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '6',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM312',
                'courseCode' => 'BA-MULGD',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '6',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM321',
                'courseCode' => 'BA-MULGD',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '8',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM322',
                'courseCode' => 'BA-MULGD',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '8',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Bachelor of Science (Biotechnology)
            /////*******************************
			/////*******************************
			/////*******************************
		    [
                'unitCode' => 'BIO10001',
                'courseCode' => 'BA-SCBIO2',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CHE10001',
                'courseCode' => 'BA-SCBIO2',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MTH00004',
                'courseCode' => 'BA-SCBIO2',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BIO10003',
                'courseCode' => 'BA-SCBIO2',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CHE10005',
                'courseCode' => 'BA-SCBIO2',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CHE10002',
                'courseCode' => 'BA-SCBIO2',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ICT10007',
                'courseCode' => 'BA-SCBIO2',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            //
            [
                'unitCode' => 'BCH20002',
                'courseCode' => 'BA-SCBIO2',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BIO20002',
                'courseCode' => 'BA-SCBIO2',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BCH20001',
                'courseCode' => 'BA-SCBIO2',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            ///
            [
                'unitCode' => 'BIO20001',
                'courseCode' => 'BA-SCBIO2',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COM20002',
                'courseCode' => 'BA-SCBIO2',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CHE20006',
                'courseCode' => 'BA-SCBIO2',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HES3410',
                'courseCode' => 'BA-SCBIO2',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'PEH20002',
                'courseCode' => 'BA-SCBIO2',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ENV30001',
                'courseCode' => 'BA-SCBIO2',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HES3405',
                'courseCode' => 'BA-SCBIO2',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HES2210',
                'courseCode' => 'BA-SCBIO2',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BIO30004',
                'courseCode' => 'BA-SCBIO2',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '6',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'NPS30002',
                'courseCode' => 'BA-SCBIO2',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '6',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HES2205',
                'courseCode' => 'BA-SCBIO2',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '6',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BCH30003',
                'courseCode' => 'BA-SCBIO2',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '7',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BIO30001',
                'courseCode' => 'BA-SCBIO2',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '7',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            /////  Civil Eng:::::
            // Year 1 Sem 1
            [
                'unitCode' => 'CVE10005',
                'courseCode' => 'F4-K002',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CVE10004',
                'courseCode' => 'F4-K002',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'PHY10001',
                'courseCode' => 'F4-K002',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MTH10006',
                'courseCode' => 'F4-K002',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Year 1 Sem 2
            [
                'unitCode' => 'CVE10002',
                'courseCode' => 'F4-K002',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MEE10001',
                'courseCode' => 'F4-K002',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MEE20004',
                'courseCode' => 'F4-K002',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MTH10007',
                'courseCode' => 'F4-K002',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Year 2 Sem 1
            [
                'unitCode' => 'CVE10006',
                'courseCode' => 'F4-K002',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CVE20002',
                'courseCode' => 'F4-K002',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CVE20003',
                'courseCode' => 'F4-K002',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MEE20003',
                'courseCode' => 'F4-K002',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Year 2 Sem 2
            [
                'unitCode' => 'CVE20001',
                'courseCode' => 'F4-K002',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],




			/////*******************************
			/////*******************************
			/////*******************************




			/////////*****************////////////


            [
                'unitCode' => 'CVE30001',
                'courseCode' => 'F4-K002',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CVE30002',
                'courseCode' => 'F4-K002',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'MTH20006',
                'courseCode' => 'F4-K002',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Year 3 Sem 1
            [
                'unitCode' => 'CVE20005',
                'courseCode' => 'F4-K002',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CVE30004',
                'courseCode' => 'F4-K002',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'CVE40004',
                'courseCode' => 'F4-K002',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'MME30001',
                'courseCode' => 'F4-K002',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Year 3 Sem 1
            [
                'unitCode' => 'CVE20004',
                'courseCode' => 'F4-K002',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CVE30003',
                'courseCode' => 'F4-K002',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'CVE40002',
                'courseCode' => 'F4-K002',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Year 3 Sem 2
            [
                'unitCode' => 'CVE40001',
                'courseCode' => 'F4-K002',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '6',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CVE40006',
                'courseCode' => 'F4-K002',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '6',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'CVE40008',
                'courseCode' => 'F4-K002',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '6',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			//year 4 sem 1
			[
                'unitCode' => 'CVE40009',
                'courseCode' => 'F4-K002',
                'unitType' => 'Core',
                'year' => 2016,
                'semester' => 'Semester 1',
                'enrolmentTerm' => '7',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]

        ]);
    }
}
