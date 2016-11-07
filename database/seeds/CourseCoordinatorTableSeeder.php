<?php

use Illuminate\Database\Seeder;

class CourseCoordinatorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('course_coordinator')->insert([
            [
                'username' => 'ComputerScience',
                'courseCode' => 'I047',
                'name' => 'Sim Kwan Hua'
            ],
            [
                'username' => 'InformationTechnology',
                'courseCode' => 'BICT',
                'name' => 'InformationTechnology Coordinator'
            ],
            [
                'username' => 'AccountingFinance',
                'courseCode' => 'BA-BUSACF1',
                'name' => 'AccountingFinance Coordinator'
            ],
            [
                'username' => 'Finance',
                'courseCode' => 'BA-BUSFIN3',
                'name' => 'Finance Coordinator'
            ],
            [
                'username' => 'InternationalBusiness',
                'courseCode' => 'BA-BUSINB4',
                'name' => 'InternationalBusiness Coordinator'
            ],
            [
                'username' => 'HumanResource',
                'courseCode' => 'BA-BUSMGT5',
                'name' => 'HumanResource Coordinator'
            ],
            [
                'username' => 'Accounting',
                'courseCode' => 'BA-BUSACC6',
                'name' => 'Accounting Coordinator'
            ],
            [
                'username' => 'Marketing',
                'courseCode' => 'BA-BUSMKT6',
                'name' => 'Marketing Coordinator'
            ],
            [
                'username' => 'GraphicDesign',
                'courseCode' => 'BA-GRADG',
                'name' => 'GraphicDesign Coordinator'
            ],
            [
                'username' => 'MultimediaDesign',
                'courseCode' => 'BA-MULGD',
                'name' => 'MultimediaDesign Coordinator'
            ],
            [
                'username' => 'CivilEngineering',
                'courseCode' => 'BH-ECV',
                'name' => 'CivilEngineering Coordinator'
            ],
            [
                'username' => 'ChemicalEngineering',
                'courseCode' => 'SK401',
                'name' => 'ChemicalEngineering Coordinator'
            ],
            [
                'username' => 'ElectricalEngineering',
                'courseCode' => 'BH-EEE',
                'name' => 'ElectricalEngineering Coordinator'
            ],
            [
                'username' => 'MechanicalEngineering',
                'courseCode' => 'BH-EME',
                'name' => 'MechanicalEngineering Coordinator'
            ],
            [
                'username' => 'RoboticsEngineering',
                'courseCode' => 'BH-ERM',
                'name' => 'RoboticsEngineering Coordinator'
            ],
            [
                'username' => 'Biotechnology',
                'courseCode' => 'BA-SCBIO2',
                'name' => 'Biotechnology Coordinator'
            ],
        ]);
    }
}
