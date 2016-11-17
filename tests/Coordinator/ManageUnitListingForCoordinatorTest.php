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
     * A test to add a unit into Unit Listing (Offered Units)
     * Condition: New unit is not yet existed in the unit listing but has already existed in the records
     * Environment: New Study Planner - produced by factory
     */
    public function testAddNewUnitInUnitListing()
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

        // create a new unit
        $this->json('POST', 'coordinator/manageunitlisting', [
            'unitCode' => $unit->unitCode,
            'year' => '2016',
            'semester' => 'Semester 1',
            'semesterLength' => 'long'
        ]);

        // check if this unit has been added
        // note: coordinator/manageunitlisting i.e: index() was not used
        $this->visit('coordinator/manageunitlisting/create')
        ->see('TESTCODE1');
    }

    /**
     * JSON API Test
     * SUCCESS TEST
     * A test to delete an existing unit from the unit listing
     * Condition: The unit has already exist in the record
     * Environment: The unit has already exist in the record
     */
    public function testRemoveExistingUnitInUnitListing()
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

        // Sample Unit
        $offeredunit = factory(App\UnitListing::class)->create([
            'unitCode' => $unit->unitCode,
            'year' => '2016',
            'semester' => 'Semester 1',
            'semesterLength' => 'long'
        ]);

        // login as coordinator
        $this->actingAs($user);

        // check before deleting the unit
        $this->visit('coordinator/manageunitlisting')
        ->see('TESTCODE1');

        // delete the unit
        $this->json('DELETE', 'coordinator/manageunitlisting/TESTCODE1', [
            'unitCode' => $offeredunit->unitCode,
            'year' => $offeredunit->year,
            'semester' => $offeredunit->semester,
            'semesterLength' => $offeredunit->semesterLength
        ]);

        // check if this unit has been removed
        $this->visit('coordinator/manageunitlisting/create')
        ->dontsee('<td>TESTCODE1</td>');
    }
}
