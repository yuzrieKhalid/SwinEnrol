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
            ], // end Business (Mixed)

            // Design
            [
                'unitCode' => 'HDC001',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDC002',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDC005',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM311',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM312',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM321',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM322',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], // end Design

            // Engineering (Mixed)
            [
                'unitCode' => 'MEE10001',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MEE20005',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MEE20004',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MEE20006',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MEE20003',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MEE40004',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MEE40001',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MEE30004',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MEE40002',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MEE40008',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MEE40009',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CVE10004',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CVE10005',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CVE10006',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CVE20002',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CVE20004',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CVE20003',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CVE30003',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CVE40004',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CVE30004',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CVE40006',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CVE40008',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CVE40009',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'RME20001',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'RME30003',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'RME40002',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'RME40005',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'RME40006',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'EEE10001',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'EEE20003',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'EEE20005',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'EEE20004',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'EEE30002',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'EEE40003',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'EEE30005',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'EEE40011',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'EEE40012',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'SWE20004',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CVE10002',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC1221',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC2411',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC2322',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC2421',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC2412',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC3651',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC3514',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC4722',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC3612',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC4722',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC3612',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC4771',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC4873',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MTH10006',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MTH10007',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'PHY10001',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MME30001',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'RME10001',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'RME10002',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MTH20008',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MME40001',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], // end Engineering (Mixed)

            // Biotechnology
            [
                'unitCode' => 'BIO10001',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CHE10001',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ICT10007',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BIO10003',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CHE10002',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BCH20002',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BIO20002',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BIO30001',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MTH00004',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BCH30003',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ENV30001',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'NPS30002',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HES2210',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HES3405',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'PEH20002',
                'year' => 2016,
                'semester' => 'Semester 2',
                'semesterLength' => 'long',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
