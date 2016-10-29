<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ManageUnitTest extends TestCase
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
     * A test to add unit during the enrolment
     * Condition: EnrolmentUnits has less than 4 records
     * Environment: EnrolmentUnits has 0 records
     *
     * @return void
     */
    public function testAddUnitFromEmpty()
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

        // authenticate
        $this->actingAs($user);

        $this->json('POST', 'student/manageunits', [
            'studentID' => $student->studentID,
            'unitCode' => $unit->unitCode,
            'year' => 2016,
            'semester' => 'Semester 1',
            'semesterLength' => 'long',
            'status' => 'pending',
            'result' => 0.00,
            'grade' => 'ungraded'
        ])->see('ok')
        ->dontsee("Cannot enrol more than 4 units.");
        // ^ see response
    }

    /**
     * JSON API Test
     * A test to add unit during the enrolment
     * Condition: EnrolmentUnits has less than 4 records
     * Environment: EnrolmentUnits is added 5 times
     *
     * @return void
     */
    public function testAddUnitWhenMaxCount()
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
        $unit = factory(App\Unit::class, 5)->create();
        // authenticate
        $this->actingAs($user);
        // todo run the API
        $this->json('POST', 'student/manageunits', [
            'studentID' => $student->studentID,
            'unitCode' => $unit[0]->unitCode,
            'year' => 2016,
            'semester' => 'Semester 1',
            'semesterLength' => 'long',
            'status' => 'pending',
            'result' => 0.00,
            'grade' => 'ungraded'
        ])->json('POST', 'student/manageunits', [
            'studentID' => $student->studentID,
            'unitCode' => $unit[1]->unitCode,
            'year' => 2016,
            'semester' => 'Semester 1',
            'semesterLength' => 'long',
            'status' => 'pending',
            'result' => 0.00,
            'grade' => 'ungraded'
        ])->json('POST', 'student/manageunits', [
            'studentID' => $student->studentID,
            'unitCode' => $unit[2]->unitCode,
            'year' => 2016,
            'semester' => 'Semester 1',
            'semesterLength' => 'long',
            'status' => 'pending',
            'result' => 0.00,
            'grade' => 'ungraded'
        ])->json('POST', 'student/manageunits', [
            'studentID' => $student->studentID,
            'unitCode' => $unit[3]->unitCode,
            'year' => 2016,
            'semester' => 'Semester 1',
            'semesterLength' => 'long',
            'status' => 'pending',
            'result' => 0.00,
            'grade' => 'ungraded'
        ])->json('POST', 'student/manageunits', [
            'studentID' => $student->studentID,
            'unitCode' => $unit[4]->unitCode,
            'year' => 2016,
            'semester' => 'Semester 1',
            'semesterLength' => 'long',
            'status' => 'pending',
            'result' => 0.00,
            'grade' => 'ungraded'
        ])->see("Cannot enrol more than 4 units.")
        ->dontsee('ok');
        // ^ see response
    }
}
