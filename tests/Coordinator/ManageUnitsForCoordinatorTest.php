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

    /**
     * JSON API Test
     * SUCCESS TEST
     * A test to edit an existing unit
     * Condition: The unit has already exist in the record
     * Environment: The unit has already exist in the record
     */
    public function testEditExisingUnit()
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

        // Sample Unit
        $unit = factory(App\Unit::class)->create([
            'unitCode' => 'TESTCODE1',
            'unitName' => 'TestUnit1',
            'creditPoints' => '12.5',
            'studyLevel' => 'Degree'
        ]);

        // login as coordinator
        $this->actingAs($user);

        // edit an existing unit
        $this->json('PUT', 'coordinator/manageunits/TESTCODE1', [
            'unitCode' => 'TESTCODE_EDITED1',
            'unitName' => 'TestUnit1',
            'creditPoints' => '12.5',
            'studyLevel' => 'Degree'
        ]);

        // check if this unit has been successfully modified
        $this->visit('coordinator/manageunits')
        ->see('TESTCODE_EDITED1');
    }

    /**
     * JSON API Test
     * SUCCESS TEST
     * A test to delete an existing unit
     * Condition: The unit has already exist in the record
     * Environment: The unit has already exist in the record
     */
    public function testRemoveExistingUnit()
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

        // Sample Unit
        $unit = factory(App\Unit::class)->create([
            'unitCode' => 'TESTCODE1',
            'unitName' => 'TestUnit1',
            'creditPoints' => '12.5',
            'studyLevel' => 'Degree'
        ]);

        // login as coordinator
        $this->actingAs($user);

        // check before deleting the unit
        $this->visit('coordinator/manageunits')
        ->see('TestUnit1');

        // delete the unit
        $this->json('DELETE', 'coordinator/manageunits/TESTCODE1');

        // check if this unit has been removed
        $this->visit('coordinator/manageunits')
        ->dontsee('TestUnit1');
    }
}
