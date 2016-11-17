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
     * A test to add a new unit into Study Planner
     * Condition: New unit is not yet existed in the study planner but has already existed in the records
     * Environment: New Study Planner - produced by factory
     */
    public function testAddNewStudyPlannerUnit()
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
        $this->json('POST', 'coordinator/managestudyplanner', [
            'unitCode' => $unit->unitCode,
            'courseCode' => $course->courseCode,
            'unitType' => 'Core',
            'year' => '2016',
            'semester' => 'Semester 1',
            'enrolmentTerm' => '0'
        ]);

        // check if this unit has been added
        $this->visit('coordinator/managestudyplanner')
        ->see('TESTCODE1');
    }

    /**
     * JSON API Test
     * SUCCESS TEST
     * A test to delete an existing unit
     * Condition: The unit has already exist in the record
     * Environment: The unit has already exist in the record
     */
    public function testRemoveExistingStudyPlannerUnit()
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
        $studyplannerunit = factory(App\StudyPlanner::class)->create([
            'unitCode' => $unit->unitCode,
            'courseCode' => 'I047',
            'unitType' => 'Core',
            'year' => '2016',
            'semester' => 'Semester 1',
            'enrolmentTerm' => '0'
        ]);

        // login as coordinator
        $this->actingAs($user);

        // check before deleting the unit
        $this->visit('coordinator/managestudyplanner')
        ->see('TESTCODE1');

        // delete the unit
        $this->json('DELETE', 'coordinator/managestudyplanner/TESTCODE1', [
            'unitCode' => $studyplannerunit->unitCode,
            'courseCode' => $studyplannerunit->courseCode,
            'unitType' => $studyplannerunit->unitType,
            'year' => $studyplannerunit->year,
            'semester' => $studyplannerunit->semester,
            'enrolmentTerm' => $studyplannerunit->enrolmentTerm
        ]);

        // check if this unit has been removed
        $this->visit('coordinator/managestudyplanner')
        ->dontsee('TESTCODE1');
    }
}
