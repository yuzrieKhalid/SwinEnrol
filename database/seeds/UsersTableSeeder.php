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
                'username' => 'I047',
                'password' => bcrypt('I047'),
                'email' => 'ComputerScience@coordinator.swinburne.edu.my',
                'permissionLevel' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'BUSFIN3',
                'password' => bcrypt('BUSFIN3'),
                'email' => 'Finance@coordinator.swinburne.edu.my',
                'permissionLevel' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'MULGD',
                'password' => bcrypt('MULGD'),
                'email' => 'MultimediaDesign@coordinator.swinburne.edu.my',
                'permissionLevel' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'enrolment_ZI',
                'password' => bcrypt('enrolment_ZI'),
                'email' => 'zarinaibrahim@enrolment.swinburne.edu.my',
                'permissionLevel' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'super',
                'password' => bcrypt('super'),
                'email' => 'super@authority.swinburne.edu.my',
                'permissionLevel' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'articulate',
                'password' => bcrypt('articulate'),
                'email' => 'articulate@students.swinburne.edu.my',
                'permissionLevel' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'articulatefail',
                'password' => bcrypt('articulatefail'),
                'email' => 'articulatefail@students.swinburne.edu.my',
                'permissionLevel' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'adminofficer',
                'password' => bcrypt('adminofficer'),
                'email' => 'adminofficer@staff.swinburne.edu.my',
                'permissionLevel' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
