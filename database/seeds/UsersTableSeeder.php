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
                'email' => '4318595@students.swinburne.edu.my',
                'permissionLevel' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'coordinator',
                'password' => bcrypt('coordinator'),
                'email' => '4318595@students.swinburne.edu.my',
                'permissionLevel' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'coordinator',
                'password' => bcrypt('coordinator'),
                'email' => '4318595@students.swinburne.edu.my',
                'permissionLevel' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'email' => '4318595@students.swinburne.edu.my',
                'permissionLevel' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'super',
                'password' => bcrypt('super'),
                'email' => '4318595@students.swinburne.edu.my',
                'permissionLevel' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'articulate',
                'password' => bcrypt('articulate'),
                'email' => '4318595@students.swinburne.edu.my',
                'permissionLevel' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'articulatefail',
                'password' => bcrypt('articulatefail'),
                'email' => '4318595@students.swinburne.edu.my',
                'permissionLevel' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
