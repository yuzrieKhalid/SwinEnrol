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
                'permissionLevel' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => '4318595',
                'password' => bcrypt('950807'),
                'permissionLevel' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => '4315405',
                'password' => bcrypt('901226'),
                'permissionLevel' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'student',
                'password' => bcrypt('student'),
                'permissionLevel' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'coordinator',
                'password' => bcrypt('coordinator'),
                'permissionLevel' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'permissionLevel' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'super',
                'password' => bcrypt('super'),
                'permissionLevel' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
