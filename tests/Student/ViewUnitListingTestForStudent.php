<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Student_ViewUnitListingTest extends TestCase
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
     * Page Test
     * SUCCESS TEST
     * A test to view unit listing for next semester
     * Condition: Unit Listing exists
     * Environment: Unit Listing is populated
     *
     * @return void
     */
    public function testViewExistingUnitListing()
    {
        // Sample user - student - course - and its dependencies
        $course = factory(App\Course::class)->create();
        $user = factory(App\User::class)->create([
            'permissionLevel' => '1',
            'password' => bcrypt('123456'),
        ]);
        $student = factory(App\Student::class)->create([
            'studentID' => $user->username,
            'courseCode' => $course->courseCode
        ]);
        $unit = factory(App\Unit::class)->create();
        $unitlisting = factory(App\UnitListing::class)->create([
            'unitCode' => $unit->unitCode,
            'semester' => 'Semester 2'
        ]);

        // authenticate
        $this->actingAs($user);
        $this->visit('/student/viewunitlistings')
             ->see($unitlisting->unitCode);
        // ^ received the correct response
    }

    /**
     * Page Test
     * FAIL TEST
     * A test to view unit listing for next semester
     * Condition: Unit Listing exists
     * Environment: Unit Listing is populated with the wrong semester
     *
     * @return void
     */
    public function testViewExistingUnitListingDifferentSemester()
    {
        // Sample user - student - course - and its dependencies
        $course = factory(App\Course::class)->create();
        $user = factory(App\User::class)->create([
            'permissionLevel' => '1',
            'password' => bcrypt('123456'),
        ]);
        $student = factory(App\Student::class)->create([
            'studentID' => $user->username,
            'courseCode' => $course->courseCode
        ]);
        $unit = factory(App\Unit::class)->create();
        $unitlisting = factory(App\UnitListing::class)->create([
            'unitCode' => $unit->unitCode,
            'semester' => 'Semester 1'
        ]);

        // authenticate
        $this->actingAs($user);
        $this->visit('/student/viewunitlistings')
             ->dontsee($unitlisting->unitCode);
        // ^ received the correct response
    }
}
