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
     * PAGE TEST
     * Test if a student user is authenticated as a student
     * 1. visits the login page
     * 2. types in username and password
     * 3. press Login button
     * 4. See "Enrolment Status" heading, username, intake year
     */
    public function testAuthenticatedAsStudent()
    {
        // Sample user - student
        $user = factory(App\User::class)->create([
            'permissionLevel' => '1',
            'password' => bcrypt('123456'),
        ]);
        $student = factory(App\Student::class)->create([
            'studentID' => $user->username
        ]);

        // - dd the variables to terminal
        // $data['user'] = $user;
        // $data['student'] = $student;
        // dd($data);

        $this->visit('/login')
             ->type($user->username, 'username')
             ->type('123456', 'password')
             ->press('Login')
             ->see($student->givenName);

        // - dd what the $this sees
        // dd($this);
    }

    /**
        * PAGE TEST
     * Test if a student user is not authenticated as a student
     * 1. visits the login page
     * 2. types in username and password
     * 3. press Login button
     * 4. See error page
     */
    public function testNotAuthenticatedAsStudent()
    {
        // Sample user - student
        $user = factory(App\User::class)->create([
            'permissionLevel' => '3',
            'password' => bcrypt('123456'),
        ]);
        $student = factory(App\Student::class)->create([
            'studentID' => $user->username
        ]);

        $this->visit('/login')
             ->type($user->username, 'username')
             ->type('123456', 'password')
             ->press('Login')
             ->dontsee($student->givenName);
    }
}
