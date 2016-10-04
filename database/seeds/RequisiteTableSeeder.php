<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RequisiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('requisite')->insert([
            // test units
            [
                'unitCode' => 'PRE0',
                'requisite' => 'COMP',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'PRE1',
                'requisite' => 'GEN1',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COR0',
                'requisite' => 'GEN0',
                'type' => 'corequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COR1',
                'requisite' => 'GEN1',
                'type' => 'corequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ANTI0',
                'requisite' => 'GEN1',
                'type' => 'antirequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ANTI1',
                'requisite' => 'COMP',
                'type' => 'antirequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // BCS units
            [
                'unitCode' => 'HIT3158',
                'requisite' => 'HIT3315',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ACC10008',
                'requisite' => 'ACC10007',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HIT3172',
                'requisite' => 'HIT3181',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HIT3181',
                'requisite' => 'HIT2080',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HIT3309',
                'requisite' => 'HIT3181',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HIT2312',
                'requisite' => 'HIT1312',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HIT2308',
                'requisite' => 'HIT3181',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HIT3311',
                'requisite' => 'HIT3309',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HIT3258',
                'requisite' => 'HIT3158',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HIT3002',
                'requisite' => 'HIT3172',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HIT3037',
                'requisite' => 'HIT3172',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Bachelor of Business (Finance)
            [
                'unitCode' => 'ECO10003',
                'requisite' => 'ECO10002',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'FIN10002',
                'requisite' => 'ACC10007',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'FIN20012',
                'requisite' => 'ECO10003',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'FIN20014',
                'requisite' => 'ACC10007',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'FIN20013',
                'requisite' => 'ECO10003',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'FIN30014',
                'requisite' => 'FIN20014',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'FIN30016',
                'requisite' => 'FIN20012',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'FIN30016',
                'requisite' => 'FIN20014',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'FIN30015',
                'requisite' => 'ECO10003',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Bachelor of Business (Accounting)
            [
                'unitCode' => 'ACC10008',
                'requisite' => 'ACC10007',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ACC20007',
                'requisite' => 'ACC10007',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'LAW20004',
                'requisite' => 'LAW10004',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ACC30005',
                'requisite' => 'ACC10007',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ACC30005',
                'requisite' => 'LAW20004',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Bachelor of Business (Management)
            [
                'unitCode' => 'MGT10002',
                'requisite' => 'MGT10001',
                'type' => 'corequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ORG20003',
                'requisite' => 'MGT10001',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ORG20002',
                'requisite' => 'MGT10001',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MGT30005',
                'requisite' => 'ACC20014',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ORG30003',
                'requisite' => 'ORG20003',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ORG30003',
                'requisite' => 'ORG20002',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MGT30005',
                'requisite' => 'ACC20014',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ACC20014',
                'requisite' => 'ACC10007',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Bachelor of Engineering (Chemical)
            [
                'unitCode' => 'CHE10002',
                'requisite' => 'CHE10001',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MTH10007',
                'requisite' => 'MTH10006',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC2421',
                'requisite' => 'MTH10007',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC2322',
                'requisite' => 'MEE10001',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MEE20002',
                'requisite' => 'CVE10002',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC2311',
                'requisite' => 'HEC1221',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MTH20007',
                'requisite' => 'MTH10007',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC3521',
                'requisite' => 'HEC2411',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC3651',
                'requisite' => 'HEC2421',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC3651',
                'requisite' => 'HEC2411',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC3514',
                'requisite' => 'HEC2421',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC2412',
                'requisite' => 'CVE10002',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC3622',
                'requisite' => 'CHE10002',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC3523',
                'requisite' => 'MTH10007',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC3512',
                'requisite' => 'MTH20007',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC4745',
                'requisite' => 'HEC3622',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC3612',
                'requisite' => 'HEC3523',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC4722',
                'requisite' => 'HEC2411',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC4873',
                'requisite' => 'HEC4771',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC4746',
                'requisite' => 'HEC4722',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC4824',
                'requisite' => 'HEC2311',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Design (Graphic)
            [
                'unitCode' => 'HDCOM121',
                'requisite' => 'HDCOM111',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM121',
                'requisite' => 'HDCOM112',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM122',
                'requisite' => 'HDCOM111',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM122',
                'requisite' => 'HDCOM112',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM211',
                'requisite' => 'HDCOM122',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM211',
                'requisite' => 'HDCOM121',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM212',
                'requisite' => 'HDCOM111',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM212',
                'requisite' => 'HDCOM112',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM212',
                'requisite' => 'HDC002',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM212',
                'requisite' => 'HDCOM121',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM221',
                'requisite' => 'HDCOM112',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM221',
                'requisite' => 'HDCOM121',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM221',
                'requisite' => 'HDCOM211',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDC005',
                'requisite' => 'HDC001',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDC005',
                'requisite' => 'HDC004',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDC005',
                'requisite' => 'HDC002',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDC005',
                'requisite' => 'HDC003',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM311',
                'requisite' => 'HDC002',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM311',
                'requisite' => 'HDCOM211',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM311',
                'requisite' => 'HDC005',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM312',
                'requisite' => 'HDCOM211',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM312',
                'requisite' => 'HDCOM212',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM312',
                'requisite' => 'HDCOM221',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM321',
                'requisite' => 'HDCOM211',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM321',
                'requisite' => 'HDC005',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM321',
                'requisite' => 'HDCOM312',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM322',
                'requisite' => 'HDCOM211',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM322',
                'requisite' => 'HDCOM221',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM322',
                'requisite' => 'HDC005',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM322',
                'requisite' => 'HDCOM312',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Science (Biotechnology)
            [
                'unitCode' => 'BCH20002',
                'requisite' => 'BIO10003',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BCH20002',
                'requisite' => 'CHE10001',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BIO20002',
                'requisite' => 'BIO10001',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BCH20001',
                'requisite' => 'CHE10002',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BCH20001',
                'requisite' => 'BCH20002',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BIO20001',
                'requisite' => 'BIO20002',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BIO30001',
                'requisite' => 'BIO20002',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BIO30001',
                'requisite' => 'BCH20001',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BIO30001',
                'requisite' => 'BIO20001',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BIO30004',
                'requisite' => 'BCH20002',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BIO30004',
                'requisite' => 'BCH20001',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BCH30003',
                'requisite' => 'BCH20002',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BCH30003',
                'requisite' => 'BCH20001',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ENV30001',
                'requisite' => 'CHE10001',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ENV30001',
                'requisite' => 'BIO10001',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ENV30001',
                'requisite' => 'CHE10002',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ENV30001',
                'requisite' => 'BIO10003',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HES2210',
                'requisite' => 'BIO10001',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HES3405',
                'requisite' => 'CHE10002',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CHE10005',
                'requisite' => 'CHE10001',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CHE20006',
                'requisite' => 'CHE10002',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'PEH20002',
                'requisite' => 'CHE10001',
                'type' => 'prerequisite',
                'index' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
