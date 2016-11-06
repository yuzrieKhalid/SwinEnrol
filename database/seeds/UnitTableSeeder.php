<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;



class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('unit')->insert([
            // test units
			///BSC
			[
                'unitCode' => 'COS10009',
                'unitName' => 'Introduction to Programming',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'COS10003',
                'unitName' => 'Computer and Logic Essential',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'COS10011',
                'unitName' => 'Creating Web Application',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'COS20001',
                'unitName' => 'User Centred Design',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MME40001',
                'unitName' => ' Test Unit',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'COS20015',
                'unitName' => 'Fundamental of Data Management',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'COS20007',
                'unitName' => 'Object-oriented Programming',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'COS10004',
                'unitName' => 'Computer Systems',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'SWE20001',
                'unitName' => 'Development Project 1 - Tools and Practices',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'COS30008',
                'unitName' => 'Data Structure and Patterns',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'COS30043',
                'unitName' => 'Interface Design and Development',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'SWE40001',
                'unitName' => 'Software Engineering Project A',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'SWE30010',
                'unitName' => 'Development Project 2 - Design, Planning and Management',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'SWE40002',
                'unitName' => 'Software Engineering Project B',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'COS30017',
                'unitName' => 'Software Developmnt for Mobile Devices',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'ICT30005',
                'unitName' => 'Professional Issues in IT',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'COS30041',
                'unitName' => 'Creating Secure and Scalable Software',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'COS30007',
                'unitName' => 'Creating Data Driven Mobile Application',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'COS20012',
                'unitName' => 'Data Communications and Security',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'COS30019',
                'unitName' => 'Introduction to Artificial Intelligence',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'COS30023',
                'unitName' => 'Languages in Software Development',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'SWE30004',
                'unitName' => 'Software Deployment and Evolution',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'SWE30009',
                'unitName' => 'Software Testing and Reliability',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'COS30014',
                'unitName' => 'OBJECT ORIENTED PROGRAMMING IN C++',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'COS30016',
                'unitName' => 'HIT3037 PROGRAMMING IN JAVA',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'SWE20004',
                'unitName' => 'TECHNICAL SOFTWARE DEVELOPMENT',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			///BICT
			[
                'unitCode' => 'TNE10005',
                'unitName' => 'Network Administration',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'INF30029',
                'unitName' => 'Information Technology Project Management',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'INF10002',
                'unitName' => 'Database Analysis and Design',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'INF30002',
                'unitName' => 'Information Technology Project',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'COS20016',
                'unitName' => 'Operating System Configuration',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'TNE10003',
                'unitName' => 'Professional Skills – Telecommunications',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'TNE10006',
                'unitName' => 'Networks and Switching',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'COS30015',
                'unitName' => 'IT Security',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'COS10021',
                'unitName' => 'Problem Solving with ICT',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			////Civil Engineering

			[
                'unitCode' => 'CVE10005',
                'unitName' => 'Civil Engineering Project',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'CVE10004',
                'unitName' => 'Mechanics of Structures',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'PHY10001',
                'unitName' => 'Energy and Motion',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'MTH10006',
                'unitName' => 'Engineering Mathematics 1',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'MEE10001',
                'unitName' => 'Materials and Processes',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'MEE20004',
                'unitName' => 'Structural Mechanics',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'CVE10006',
                'unitName' => 'Sustainable Design',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'CVE20002',
                'unitName' => 'Computer Aided Engineering Civil',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'CVE20003',
                'unitName' => 'Design of Concrete Structures',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'MEE20003',
                'unitName' => 'Fluid Mechanics',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'CVE20001',
                'unitName' => 'Topographical Engineering',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'CVE30001',
                'unitName' => 'Urban Water Resources',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'CVE30002',
                'unitName' => 'Design of Steel Structures',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'MTH20006',
                'unitName' => 'Engineering Mathematics 3C',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'CVE20005',
                'unitName' => 'Road Engineering',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'CVE30004',
                'unitName' => 'Cost Engineering',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'CVE40004',
                'unitName' => 'Water and Env. Engineering',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'EAT20008',
                'unitName' => 'Professional Experience in Engineering',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'CVE20004',
                'unitName' => 'Geomechanics',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'CVE30003',
                'unitName' => 'Transport Engineering',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'CVE40002',
                'unitName' => 'Structural Design of Low Rise Buildings',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'CVE40001',
                'unitName' => 'Geotechnical Engineering',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'CVE40006',
                'unitName' => 'Infrastructure Design Project',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'CVE40008',
                'unitName' => 'Final Year Research Project 1 (Civil)',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'CVE40009',
                'unitName' => 'Final Year Research Project 2 (Civil)',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			///Chemical Engineering
			[
                'unitCode' => 'CVE10002',
                'unitName' => 'Professional Engineering',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CHE10001',
                'unitName' => 'Chemistry 1',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC1221',
                'unitName' => 'Engineering Project',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CHE10002',
                'unitName' => 'Chemistry 2',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MTH10007',
                'unitName' => 'Engineering Mathematics 2',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'EEE10001',
                'unitName' => 'Electronic Systems',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC2411',
                'unitName' => 'Chemical Engineering Thermodynamics',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC2421',
                'unitName' => 'Fluid Mechanics C',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MEE20005',
                'unitName' => 'Materials & Manufacturing 1',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MTH20008',
                'unitName' => 'Engineering Mathematics 4A',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MEE20001',
                'unitName' => 'Thermodynamics 1',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MEE40001',
                'unitName' => 'Thermodynamics 2',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MEE30004',
                'unitName' => 'Solid Mechanics',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MEE30002',
                'unitName' => 'Control Engineering',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MEE30001',
                'unitName' => 'Materials and Manufacturing 2',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MEE40002',
                'unitName' => 'Materials and Manufacturing 2',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MEE40004',
                'unitName' => 'Fluid Mechanics 2',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MEE40008',
                'unitName' => 'Final Year Research Project 1 (Mech)',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MEE40009',
                'unitName' => 'Final Year Research Project 2 (Mech)',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC2322',
                'unitName' => 'Engineering Materials and Characterisation',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MEE20002',
                'unitName' => 'Computer Aided Engineering (Mechanical)',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC2311',
                'unitName' => 'Introduction to Chemical Engineering Design',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MTH20007',
                'unitName' => 'Engineering Mathematics 3A',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC3521',
                'unitName' => 'Process Heat Transfer',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC3651',
                'unitName' => 'Transport Phenomena',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC3514',
                'unitName' => 'Multiphase Processes',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC2412',
                'unitName' => 'Safe and Sustainable Design',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MME30001',
                'unitName' => 'Engineering Management 1',
                'creditPoints' => '100',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC3622',
                'unitName' => 'Reaction Engineering',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC3523',
                'unitName' => 'Process Modelling and Optimisation',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC3512',
                'unitName' => 'Process Control and Measurements',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC4842',
                'unitName' => 'Environmental Engineering',
                'creditPoints' => '250',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC4771',
                'unitName' => 'Final Year Research Project 1 (Chemical)',
                'creditPoints' => '275',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC4745',
                'unitName' => 'Advanced Reaction Engineering',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC3612',
                'unitName' => 'Chemical Engineering Computations',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC4722',
                'unitName' => 'Process Mass Transfer',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC4873',
                'unitName' => 'Final Year Research Project 2 (Chemical)',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC4746',
                'unitName' => 'Advanced Separation Process',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HEC4824',
                'unitName' => 'Process Plant Design',
                'creditPoints' => '275',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

			//// Chemical eng: end

			//// Electronic EE
			[
                'unitCode' => 'EEE40011',
                'unitName' => 'Final Year Research Project 1 (BEET)',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'EEE40012',
                'unitName' => 'Final Year Research Project 2 (BEET)',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'PHY40001',
                'unitName' => 'Electromagnetic Waves',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'EEE30005',
                'unitName' => 'Electrical Integrated Design Project',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'EEE30002',
                'unitName' => 'Electrical Power Systems',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'EEE20005',
                'unitName' => 'Electrical Machines',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'EEE20003',
                'unitName' => 'Embedded Microcontrollers',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'EEE20001',
                'unitName' => 'Digital Electronics Design',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'EEE20004',
                'unitName' => 'Analogue Electronics 1',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'EEE30001',
                'unitName' => 'Analogue Electronics 2',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'PRE10',
                'unitName' => 'Multi-Prerequisite (Success)',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'PRE11',
                'unitName' => 'Multi-Prerequisite (Fail)',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'PRG0',
                'unitName' => 'Prerequisite Group (Success)',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'PRG1',
                'unitName' => 'Prerequisite Group (Fail)',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COMPA',
                'unitName' => 'Completed Prerequisite A',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COMPB',
                'unitName' => 'Completed Prerequisite B',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COMPC',
                'unitName' => 'Completed Prerequisite C',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COMP',
                'unitName' => 'Completed Unit',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'GEN0',
                'unitName' => 'Generic Unit',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'GEN1',
                'unitName' => 'Generic Unit (Fail)',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'PRE0',
                'unitName' => 'Prerequisite of Completed Unit (Success)',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'PRE1',
                'unitName' => 'Unit With Prerequisite (Fail)',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COR0',
                'unitName' => 'Unit With Corequisite (Success)',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COR1',
                'unitName' => 'Unit With Corequisite (Fail)',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ANTI0',
                'unitName' => 'Antirequisite Unit 1 (Success)',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ANTI1',
                'unitName' => 'Antirequisite Unit 2 (Fail)',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CRP0',
                'unitName' => 'A Unit With Few Credit Points (Success)',
                'creditPoints' => '25',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CRP1',
                'unitName' => 'A Unit With Many Credit Points (Fail)',
                'creditPoints' => '900',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'SHO27',
                'unitName' => 'Short Semester Unit',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'FO1',
                'unitName' => 'Foundation Unit 1',
                'creditPoints' => '0',
                'studyLevel' => 'Foundation',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'FO2',
                'unitName' => 'Foundation Unit 2',
                'creditPoints' => '0',
                'studyLevel' => 'Foundation',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],


            // Bachelor of Business (Finance)
            [
                'unitCode' => 'MGT10001',
                'unitName' => 'Introduction to Management',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'LAW10004',
                'unitName' => 'Introduction to Business Law',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COM10007',
                'unitName' => 'Professional Communication Practice',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ECO10002',
                'unitName' => 'Microeconomics',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ACC10007',
                'unitName' => 'Financial Information for Decision Making',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ECO10003',
                'unitName' => 'Macroeconomics',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'FIN10002',
                'unitName' => 'Financial Statistics',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'FIN20012',
                'unitName' => 'Financial Markets',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'FIN20014',
                'unitName' => 'Financial Management',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'FIN20013',
                'unitName' => 'Monetary Policy and Risk Management',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BUS30010',
                'unitName' => 'Integrative Business Practice',
                'creditPoints' => '200',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'FIN30014',
                'unitName' => 'Financial Risk Management',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'FIN30016',
                'unitName' => 'Management of Investment Portfolios',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BUS30009',
                'unitName' => 'Industry Consulting Project',
                'creditPoints' => '250',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'FIN30015',
                'unitName' => 'International Finance',
                'creditPoints' => '200',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ENT30010',
                'unitName' => 'Contemporary Issues in Entrepreneurship and Innovation',
                'creditPoints' => '200',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Accounting Advance Minor
            [
                'unitCode' => 'ACC10008',
                'unitName' => 'Financial Information Systems',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ACC20007',
                'unitName' => 'Management Accounting for Planning & Control',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'LAW20004',
                'unitName' => 'Company Law',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ACC30005',
                'unitName' => 'Taxation',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Management Major
            [
                'unitCode' => 'MGT10002',
                'unitName' => 'Critical Thinking in Management',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ORG20003',
                'unitName' => 'Organisational Behaviour',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ORG20002',
                'unitName' => 'Business and Society',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MGT30005',
                'unitName' => 'Strategic Planning in Dynamic Environments',
                'creditPoints' => '200',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ORG30003',
                'unitName' => 'Sustainable Organisational Design',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ORG30002',
                'unitName' => 'Leadership in Context',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ACC20014',
                'unitName' => 'Management Decision Making',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MKT10007',
                'unitName' => 'Fundamentals of Marketing',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Design (Graphic Design)
            [
                'unitCode' => 'HDC001',
                'unitName' => '20th Century Design',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDC002',
                'unitName' => 'Methods of Investigation',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDC003',
                'unitName' => 'Design Studio',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDC004',
                'unitName' => 'Digital Design',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM111',
                'unitName' => 'Introduction to Communication Design',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM112',
                'unitName' => 'Typography',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM121',
                'unitName' => 'Form & Structure for Communication Design',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM122',
                'unitName' => 'Photography in Communication Design',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM211',
                'unitName' => 'Typography for Publication',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM212',
                'unitName' => 'Package Design',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM221',
                'unitName' => 'Branding and Identity',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDC005',
                'unitName' => 'Contemporary Design Issues',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM311',
                'unitName' => 'Communication Design Strategy',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM312',
                'unitName' => 'Design for Production',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM321',
                'unitName' => 'Publication Design',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HDCOM322',
                'unitName' => 'Information and Interface Design',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Science (Biotechnology)
            [
                'unitCode' => 'BIO10001',
                'unitName' => 'Concepts of Biology',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ICT10007',
                'unitName' => 'Introduction to e-Science',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BIO10003',
                'unitName' => 'Concepts of Biotechnology',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BCH20002',
                'unitName' => 'Introduction to Biochemistry',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BIO20002',
                'unitName' => 'The Microbial World',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'COM20002',
                'unitName' => 'Communication for Scientists',
                'creditPoints' => '100',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BCH20001',
                'unitName' => 'Biochemistry of Genes and Proteins',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BIO20001',
                'unitName' => 'Microbes in the Environment',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BIO30001',
                'unitName' => 'Biotechnology Research Project',
                'creditPoints' => '125',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BIO30004',
                'unitName' => 'Molecular Biotechnology',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MTH00004',
                'unitName' => 'Foundation Mathematics',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'BCH30003',
                'unitName' => 'Advanced Biochemistry',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'ENV30001',
                'unitName' => 'Environmental Biology',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'NPS30002',
                'unitName' => 'Research Skills in Science',
                'creditPoints' => '150',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HES2205',
                'unitName' => 'Aquatic Biotechnology',
                'creditPoints' => '150',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HES2210',
                'unitName' => 'Industrial Microbiology',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HES3405',
                'unitName' => 'Natural Products',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'HES3410',
                'unitName' => 'Project Development and Evaluation',
                'creditPoints' => '150',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Biotechnology Electives
            [
                'unitCode' => 'CHE10005',
                'unitName' => 'Consumer Chemistry',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'CHE20006',
                'unitName' => 'Analytical and Forensic Chemistry',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'PEH20002',
                'unitName' => 'Food Science',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'PEH20005',
                'unitName' => 'Communicable Disease Control',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			///Robotics
            [
                'unitCode' => 'EEE20006',
                'unitName' => 'Circuits and Electronics 1',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MEE20006',
                'unitName' => 'Machine Dynamics 1',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MEE30003',
                'unitName' => 'Machine Design',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'EEE40003',
                'unitName' => 'Digital Signal & Image Processing',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'unitCode' => 'MEE40003',
                'unitName' => 'Machine Dynamics 2',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'RME10001',
                'unitName' => 'Robotics & Mechatronics Project 1',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'RME10002',
                'unitName' => 'Robotics & Mechatronics Project 2',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'RME20001',
                'unitName' => 'Electrical Actuators and Sensors',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'RME30002',
                'unitName' => 'Control and Automation',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'RME40002',
                'unitName' => 'Mechatronics Systems Design',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'RME30003',
                'unitName' => 'Robotic Control ',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'RME40005',
                'unitName' => 'Final Year Research Project 1',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'RME40003',
                'unitName' => 'Robot System Design',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
			[
                'unitCode' => 'RME40006',
                'unitName' => 'Final Year Research Project 2',
                'creditPoints' => '0',
                'studyLevel' => 'Degree',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]

			//// Robotics End
			// [
            //     'unitCode' => '',
            //     'unitName' => '',
            //     'creditPoints' => '0',
            //
            //
            //
            //
            //
            //     'studyLevel' => 'Degree',
            //     'studyLevel' => 'Degree',
            //     'created_at' => Carbon::now(),
            //     'updated_at' => Carbon::now()
            // ]


			/////////////*********************////////////

			/////////////*********************////////////

        ]);
    }
}
