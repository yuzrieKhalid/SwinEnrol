<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TrackingUnitsForCoordinatorTest extends TestCase
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
     * A test to add unit to be tracked by coordinator
     * Condition: Unit exist in Study Planner
     * Environment: EnrolmentUnits has 0 records
     */
    public function testAddUnitToTrackFromStudyPlanner()
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

        // Sample data - Unit and Study Planner
        $unit = factory(App\Unit::class)->create();
        $unitInPlanner = factory(App\StudyPlanner::class)->create([
            'unitCode' => $unit->unitCode,
            'courseCode' => $course->courseCode
            // UnitType: core, intake: Semester 1 2016
        ]);

        // login as coordinator
        $this->actingAs($user);

        // add track
        $this->json('POST', 'coordinator', [
            'username' => $user->username,
            'unitCode' => $unitInPlanner->unitCode
        ])->seePageIs('coordinator')
        ->see($unitInPlanner->unitCode);
    }
}
