<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UnitListingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('unit_listing')->insert([
            // Computing (BCS + BICT)
            // Semester 2 2016
            [
                'unitCode' => 'COS10003',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COS10004',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COS10009',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COS10011',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COS20001',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COS20007',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COS20015',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COS30008',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COS30015',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COS30016',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], // 10
            [
                'unitCode' => 'COS30017',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COS30019',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COS30041',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ICT30005',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'INF10002',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'INF30002',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'TNE10006',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], // end BCS + BICT Semester 2 2016

            // Business Units (Mixed)
            [
                'unitCode' => 'ACC10007',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ACC10008',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ACC20014',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'FIN20014',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ACC20007',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ACC30005',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'FIN30014',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ECO10002',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ECO10003',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'FIN20012',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'FIN20013',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'FIN30015',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MGT10001',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ORG20003',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ORG20002',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'LAW10004',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'LAW20004',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MKT10007',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BUS30010',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BUS30009',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'FIN10002',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COM10007',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MGT10002',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ORG20002',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ENT30010',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ORG30003',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MGT30005',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'FIN30016',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
