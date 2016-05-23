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
                'permissionLevel' => 'student',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'student',
                'password' => bcrypt('student'),
                'permissionLevel' => 'student',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'coordinator',
                'password' => bcrypt('coordinator'),
                'permissionLevel' => 'coordinator',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'permissionLevel' => 'admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'super',
                'password' => bcrypt('super'),
                'permissionLevel' => 'super',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
