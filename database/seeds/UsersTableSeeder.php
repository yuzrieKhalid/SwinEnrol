<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'username' => '4304373',
                'password' => bcrypt('940927'),
                'email' => '4304373@students.swinburne.edu.my',
                'permissionLevel' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => '4318595',
                'password' => bcrypt('950807'),
                'email' => '4318595@students.swinburne.edu.my',
                'permissionLevel' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => '4315405',
                'password' => bcrypt('901226'),
                'email' => '4315405@students.swinburne.edu.my',
                'permissionLevel' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'student',
                'password' => bcrypt('student'),
                'email' => 'student@students.swinburne.edu.my',
                'permissionLevel' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'ComputerScience',
                'password' => bcrypt('123'),
                'email' => 'ComputerScience@coordinator.swinburne.edu.my',
                'permissionLevel' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'InformationTechnology',
                'password' => bcrypt('123'),
                'email' => 'InformationTechnology@coordinator.swinburne.edu.my',
                'permissionLevel' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'AccountingFinance',
                'password' => bcrypt('123'),
                'email' => 'AccountingFinance@coordinator.swinburne.edu.my',
                'permissionLevel' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'Finance',
                'password' => bcrypt('123'),
                'email' => 'Finance@coordinator.swinburne.edu.my',
                'permissionLevel' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'InternationalBusiness',
                'password' => bcrypt('123'),
                'email' => 'InternationalBusiness@coordinator.swinburne.edu.my',
                'permissionLevel' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'HumanResource',
                'password' => bcrypt('123'),
                'email' => 'HumanResource@coordinator.swinburne.edu.my',
                'permissionLevel' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'Accounting',
                'password' => bcrypt('123'),
                'email' => 'Accounting@coordinator.swinburne.edu.my',
                'permissionLevel' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'Marketing',
                'password' => bcrypt('123'),
                'email' => 'Marketing@coordinator.swinburne.edu.my',
                'permissionLevel' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'GraphicDesign',
                'password' => bcrypt('123'),
                'email' => 'GraphicDesign@coordinator.swinburne.edu.my',
                'permissionLevel' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'MultimediaDesign',
                'password' => bcrypt('123'),
                'email' => 'MultimediaDesign@coordinator.swinburne.edu.my',
                'permissionLevel' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'CivilEngineering',
                'password' => bcrypt('123'),
                'email' => 'CivilEngineering@coordinator.swinburne.edu.my',
                'permissionLevel' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'ChemicalEngineering',
                'password' => bcrypt('123'),
                'email' => 'ChemicalEngineering@coordinator.swinburne.edu.my',
                'permissionLevel' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'ElectricalEngineering',
                'password' => bcrypt('123'),
                'email' => 'ElectricalEngineering@coordinator.swinburne.edu.my',
                'permissionLevel' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'MechanicalEngineering',
                'password' => bcrypt('123'),
                'email' => 'MechanicalEngineering@coordinator.swinburne.edu.my',
                'permissionLevel' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'RoboticsEngineering',
                'password' => bcrypt('123'),
                'email' => 'RoboticsEngineering@coordinator.swinburne.edu.my',
                'permissionLevel' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'Biotechnology',
                'password' => bcrypt('123'),
                'email' => 'Biotechnology@coordinator.swinburne.edu.my',
                'permissionLevel' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'zarina',
                'password' => bcrypt('123'),
                'email' => 'zarinaibrahim@enrolment.swinburne.edu.my',
                'permissionLevel' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'super',
                'password' => bcrypt('123'),
                'email' => 'super@authority.swinburne.edu.my',
                'permissionLevel' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'articulate',
                'password' => bcrypt('123'),
                'email' => 'articulate@students.swinburne.edu.my',
                'permissionLevel' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'articulatefail',
                'password' => bcrypt('123'),
                'email' => 'articulatefail@students.swinburne.edu.my',
                'permissionLevel' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'officer',
                'password' => bcrypt('123'),
                'email' => 'adminofficer@staff.swinburne.edu.my',
                'permissionLevel' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
