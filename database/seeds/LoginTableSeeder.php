<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
                'permissionLevel' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => '5555555',
                'password' => '940927',
                'permissionLevel' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'coordinator',
                'password' => 'secret',
                'permissionLevel' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'admin',
                'password' => 'secret',
                'permissionLevel' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
