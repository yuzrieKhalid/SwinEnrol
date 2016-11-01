<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminHomepageTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }

    public function tearDown()
    {
        Artisan::call('migrate:rollback');
    }

    /**
     * Test if a Admin user is authenticated as a Admin
     * 1. visits the login page
     * 2. types in username and password
     * 3. press Login button
     * 4. See Admin Hompage
     */
    public function testAuthenticatedAsAdmin()
    {

        $user = factory(App\User::class)->create([
            'permissionLevel' => '3',
            'password' => bcrypt('123456'),
        ]);

        $this->visit('/login')
             ->type($user->username, 'username')
             ->type('123456', 'password')
             ->press('Login')
             ->seePageIs('admin');

            // - dd what the $this sees
            // dd($this);
    }
    /**
     * Test if a Admin user is not authenticated as a Admin
     * 1. visits the login page
     * 2. types in username and password
     * 3. press Login button
     * 4. See Admin Hompage
     */
    // public function testNotAuthenticatedAsAdmin()
    // {
    //
    //     $user = factory(App\User::class)->create([
    //         'permissionLevel' => '3',
    //         'password' => bcrypt('123456'),
    //     ]);
    //
    //     $this->visit('/login')
    //          ->type($user->username, 'username')
    //          ->type('123456', 'password')
    //          ->press('Login')
    //          ->dontSee('Home');
    // }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
}
