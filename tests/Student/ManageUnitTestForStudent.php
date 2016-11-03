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
     * SUCCESS TEST
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
        // ^ received the correct response
    }

    /**
     * JSON API Test
     * FAIL TEST
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
        // ^ received the correct response
    }

    /**
     * JSON API Test
     * SUCCESS TEST
     * A test to remove unit from current enrolled list
     * Condition: EnrolmentUnits has more than 0 records
     * Environment: EnrolmentUnits has 1 record
     *
     * @return void
     */
    public function testRemoveUnitFromExistingList()
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
        $unit = factory(App\Unit::class)->create([
            'unitCode' => 'abc123'
        ]);

        // authenticate
        $this->actingAs($user);

        $this->json('POST', 'student/manageunits', [
            'studentID' => $student->studentID,
            'unitCode' => 'abc123',
            'year' => 2016,
            'semester' => 'Semester 1',
            'semesterLength' => 'long',
            'status' => 'pending',
            'result' => 0.00,
            'grade' => 'ungraded'
        ])->json('DELETE', 'student/manageunits/abc123')
        ->see('deleted');
        // ^ received the correct response
    }

    /**
     * Page Test
     * SUCCESS TEST
     * A test to articulate a student to a degree course
     * Condition: Articulation condition met
     * Environment: Articulation condition met
     *
     * @return void
     */
    public function testArticulationToDegreeSuccessful()
    {
        // Sample user - student - course - and its dependencies
        $course = factory(App\Course::class)->create(['studyLevel' => 'Foundation']);
        $user = factory(App\User::class)->create([
            'permissionLevel' => '1',
            'password' => bcrypt('123456'),
        ]);
        $student = factory(App\Student::class)->create([
            'studentID' => $user->username,
            'courseCode' => $course->courseCode
        ]);
        $units = factory(App\Unit::class, 2)->create();
        $studyplanner = factory(App\StudyPlanner::class)->create([
            'unitCode' => $units[0]->unitCode,
            'courseCode' => $course->courseCode
        ], [
            'unitCode' => $units[1]->unitCode,
            'courseCode' => $course->courseCode
        ]);
        $enrolmentunits = factory(App\EnrolmentUnits::class)->create([
            'studentID' => $student->studentID,
            'unitCode' => $units[0]->unitCode,
            'status' => 'confirmed',
            'grade' => 'pass'
        ], [
            'studentID' => $student->studentID,
            'unitCode' => $units[1]->unitCode,
            'status' => 'confirmed',
            'grade' => 'pass'
        ]);

        $this->actingAs($user);
        $this->visit('/student/manageunits/create')
             ->see('Articulation')
             ->select('I047', 'courseCode')
             ->press('Update')
             ->see('Current Enrolment')
             ->dontsee('Articulation');
    }

    /**
     * Page Test
     * FAIL TEST
     * A test to articulate a student to a degree course
     * Condition: Articulation condition met
     * Environment: Articulation condition not met
     *
     * @return void
     */
    public function testArticulationToDegreeFailed()
    {
        // Sample user - student - course - and its dependencies
        $course = factory(App\Course::class)->create(['studyLevel' => 'Foundation']);
        $user = factory(App\User::class)->create([
            'permissionLevel' => '1',
            'password' => bcrypt('123456'),
        ]);
        $student = factory(App\Student::class)->create([
            'studentID' => $user->username,
            'courseCode' => $course->courseCode
        ]);
        $units = factory(App\Unit::class, 2)->create();
        $studyplanner = factory(App\StudyPlanner::class)->create([
            'unitCode' => $units[0]->unitCode,
            'courseCode' => $course->courseCode
        ], [
            'unitCode' => $units[1]->unitCode,
            'courseCode' => $course->courseCode
        ]);
        $enrolmentunits = factory(App\EnrolmentUnits::class)->create([
            'studentID' => $student->studentID,
            'unitCode' => $units[0]->unitCode,
            'status' => 'confirmed',
            'grade' => 'failed'
        ], [
            'studentID' => $student->studentID,
            'unitCode' => $units[1]->unitCode,
            'status' => 'confirmed',
            'grade' => 'pass'
        ]);

        $this->actingAs($user);
        $this->visit('/student/manageunits/create')
             ->see('Current Enrolment')
             ->dontsee('Articulation');
    }
}
