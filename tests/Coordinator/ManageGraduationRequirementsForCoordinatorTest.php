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
     * PAGE Test
     * SUCCESS TEST
     * A test to add new graduationrequirements
     * Condition: The selected requirement is not yet added to the course
     * Environment: GraduationRequirements table is empty
     */
    public function testAddNewRequirement()
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
        $this->json('POST', 'coordinator/graduationrequirements', [
            'courseCode' => $course->courseCode,
            'unitType' => 'Core',
            'unitCount' => '20',
        ]);

        // check if this unit has been added
        // note: coordinator/graduationrequirements i.e: index() was not used
        $this->visit('coordinator/graduationrequirements/create')
        ->see('Core')
        ->see('20');
    }

    /**
     * PAGE Test
     * SUCCESS TEST
     * A test to modify existing graduationrequirements
     * Condition: The selected requirement has been added to the course
     * Environment: GraduationRequirements table contains an existing requirement
     */
    public function testEditExisingRequirement()
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

        // Sample Requirement
        $gradrequirement = factory(App\GraduationRequirements::class)->create([
            'courseCode' => $course->courseCode,
            // 'unitType' => 'Core', 'unitCount' => '20',
        ]);

        // login as coordinator
        $this->actingAs($user);

        // edit an existing requirement
        $this->json('PUT', 'coordinator/graduationrequirements/Core', [
            'courseCode' => $course->courseCode,
            'unitType' => 'Core',
            'unitCount' => '8',
        ]);

        // check if this requirement has been successfully modified
        $this->visit('coordinator/graduationrequirements/create')
        ->see('Core')
        ->see('8');
    }

    /**
     * PAGE Test
     * SUCCESS TEST
     * A test to remove existing graduationrequirements
     * Condition: The selected requirement has been added to the course
     * Environment: GraduationRequirements table contains an existing requirement
     */
    public function testRemoveExistingRequirement()
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

        // Sample Requirement
        $gradrequirement = factory(App\GraduationRequirements::class)->create([
            'courseCode' => $course->courseCode,
            // 'unitType' => 'Core', 'unitCount' => '20',
        ]);

        // login as coordinator
        $this->actingAs($user);

        // check before deleting the unit
        // Core still can be seen from <select>
        $this->visit('coordinator/graduationrequirements/create')
        ->see('20');

        // delete the unit
        $this->json('DELETE', 'coordinator/graduationrequirements/Core');

        // check if this unit has been removed
        $this->visit('coordinator/graduationrequirements/create')
        ->dontsee('20');
    }
}
