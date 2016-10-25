<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;
use App\Student;

class HomepageTest extends TestCase
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
     * @test if a student user is authenticated
     */
    public function testAuthenticated()
    {
        // Sample user - student
        $user = factory(App\User::class)->create();
        $student = factory(App\Student::class)->create();

        // - dd the variables to terminal
        // $data['user'] = $user;
        // $data['student'] = $student;
        // dd($data);

        $this->visit('/login')                      // sees the login page
             ->type($user->username, 'username')    // types in username
             ->type('123456', 'password')           // types in password
             ->press('Login')                       // press Login button
             ->see('Enrolment Status')              // able to see the Enrolment Status heading
             ->see($user->username)
             ->see($student->year);

        // - dd what the $this sees
        // dd($this);
    }
}
