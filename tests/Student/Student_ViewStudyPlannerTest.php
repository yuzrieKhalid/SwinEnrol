<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Student_ViewStudyPlannerTest extends TestCase
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
     * A test to view study planners
     * Condition: Study Planner exists
     * Environment: Study Planner populated
     *
     * @return void
     */
    public function testViewExistingStudyPlanner()
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
        $units = factory(App\Unit::class, 3)->create();
        $studyplanner = factory(App\StudyPlanner::class)->create([
            'unitCode' => $units[0]->unitCode,
            'courseCode' => $course->courseCode,
            'semester' => 'Semester 1',
        ], [
            'unitCode' => $units[1]->unitCode,
            'courseCode' => $course->courseCode,
            'semester' => 'Semester 1',
        ], [
            'unitCode' => $units[2]->unitCode,
            'courseCode' => $course->courseCode,
            'semester' => 'Semester 2',
        ]);

        // authenticate
        $this->actingAs($user);
        $this->visit('/student/viewstudyplanner')
             ->see('Year 1 Semester 1');
        // ^ received the correct response
    }

    /**
     * Page Test
     * FAIL TEST
     * A test to view study planner
     * Condition: Study Planner exists
     * Environment: Study Planner is not populated
     *
     * @return void
     */
    public function testViewNonExistingStudyPlanner()
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
        $units = factory(App\Unit::class, 3)->create();

        // authenticate
        $this->actingAs($user);
        $this->visit('/student/viewstudyplanner')
             ->dontsee('Year 1 Semester 1');
        // ^ received the correct response
    }
}
