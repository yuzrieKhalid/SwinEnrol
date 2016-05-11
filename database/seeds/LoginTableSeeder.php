<?php

use Illuminate\Database\Seeder;

class LoginTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('login')->insert([
            [
                'username' => '4304373',
                'password' => '940927',
                'permissionLevel' => 1
            ],
            [
                'username' => '5555555',
                'password' => '940927',
                'permissionLevel' => 1
            ],
            [
                'username' => 'coordinator',
                'password' => 'secret',
                'permissionLevel' => 2
            ],
            [
                'username' => 'admin',
                'password' => 'secret',
                'permissionLevel' => 3
            ]
        ]);
    }
}
