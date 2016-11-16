<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ManageUnitsForCoordinatorTest extends TestCase
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
     * JSON API Test
     * SUCCESS TEST
     * A test to add a new unit
     * Condition: New unit is not yet existed in the record
     * Environment: New unit is not yet existed in the record
     */
    public function testAddNewUnit()
    {
        // Sample data - Course Coordinator
        $course = factory(App\Course::class)->create();
        $user = factory(App\User::class)->create([
            'permissionLevel' => '2',
            'password' => bcrypt('123456'),
        ]);
        $coordinator = factory(App\CourseCoordinator::class)->create([
            'username' => $user->username,
            'courseCode' => $course->courseCode
        ]);

        // login as coordinator
        $this->actingAs($user);

        // create a new unit
        $this->json('POST', 'coordinator/manageunits', [
            'unitCode' => 'TESTCODE1',
            'unitName' => 'TestUnit1',
            'creditPoints' => '12.5',
            'studyLevel' => 'Degree'
        ]);

        // check if this unit has been added
        $this->visit('coordinator/manageunits')
        ->see('TestUnit1');
    }

}
