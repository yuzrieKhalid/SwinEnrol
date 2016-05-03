<?php

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'name' => 'Yuzrie Khalid',
            'username' => '4318595',
            'email' => 'yuyieyuzrie@gmail.com',
            'password' => Hash::make('070895'),
        ));
    }
}
