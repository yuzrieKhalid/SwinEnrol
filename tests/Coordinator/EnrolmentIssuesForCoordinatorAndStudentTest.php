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
     * A test to submit Course Transfer [by Student]
     * Condition: Course Transfer Form has not yet been submitted even once
     * Environment: Course Transfer Form has not yet been submitted even once
     */
    public function testStudentSubmitCourseTransfer()
    {
        // Sample data - Student
        $course = factory(App\Course::class)->create();
        $user = factory(App\User::class)->create([
            'permissionLevel' => '1',
            'password' => bcrypt('123456'),
        ]);
        $student = factory(App\Student::class)->create([
            'studentID' => $user->username,
            'courseCode' => $course->courseCode
        ]);

        // login as coordinator
        $this->actingAs($user);

        // submit course transfer form and see if the form has been submitted
        $this->json('POST', 'student/coursetransfer', [
            'issueID' => 1,
            'submissionData' => "{\"yearOfRequestedTransfer\":\"2016\",\"fromProgramCode\":\"I047\",\"fromProgramTitle\":\"Bachelor of Computer Science\",\"fromProgramIntakeYear\":\"2016\",\"toProgramCode\":\"BH-ERM\",\"toProgramTitle\":\"Business\",\"toProgramYear\":\"2016\",\"toReasons\":\"Sample to go Business\"}",
            'attachmentData' => ""
        ])->seeJson([
            'studentID' => $student->studentID,
            'issueID' => 1,
            'status' => 'pending'
        ]);
    }

    /**
     * PAGE Test
     * SUCCESS TEST
     * A test to approve Course Transfer submitted by Student [by Coordinator]
     * Condition: Course Transfer Form has been submitted from student
     * Environment: Course Transfer Form has been submitted from student
     */
    public function testApproveCourseTransferRequest()
    {
        // Sample data - Course Coordinator
        $course = factory(App\Course::class)->create();
        $user = factory(App\User::class)->create([
            'permissionLevel' => '2',
            'password' => bcrypt('123456'),
        ]);
        $student = factory(App\Student::class)->create([
            'studentID' => $user->username,
            'courseCode' => $course->courseCode
        ]);

        // Sample Course Transfer Issue
        $coursetransfer = factory(App\StudentEnrolmentIssues::class)->create([
            'studentID' => $student->studentID,
            'issueID' => 1,
            'submissionData' => "{\"yearOfRequestedTransfer\":\"2016\",\"fromProgramCode\":\"I047\",\"fromProgramTitle\":\"Bachelor of Computer Science\",\"fromProgramIntakeYear\":\"2016\",\"toProgramCode\":\"BH-ERM\",\"toProgramTitle\":\"Business\",\"toProgramYear\":\"2016\",\"toReasons\":\"Sample to go Business\"}",
            'attachmentData' => ""
        ]);

        // login as coordinator
        $this->actingAs($user);

        // edit an existing requirement
        $this->json('PUT', 'coordinator/resolveenrolmentissues/'. $student->studentID .'/issue/1', [
            'proposedProgramCode' => 'BH-ERM',
            'proposedIntakeYear' => '2016'
        ])->seeJson([
            'status' => 'approved'
        ]);
    }

    /**
     * PAGE Test
     * SUCCESS TEST
     * A test to disapprove Course Transfer submitted by Student [by Coordinator]
     * Condition: Course Transfer Form has been submitted from student
     * Environment: Course Transfer Form has been submitted from student
     */
    public function testDisapproveCourseTransferRequest()
    {
        // Sample data - Course Coordinator
        $course = factory(App\Course::class)->create();
        $user = factory(App\User::class)->create([
            'permissionLevel' => '2',
            'password' => bcrypt('123456'),
        ]);
        $student = factory(App\Student::class)->create([
            'studentID' => $user->username,
            'courseCode' => $course->courseCode
        ]);

        // Sample Course Transfer Issue
        $coursetransfer = factory(App\StudentEnrolmentIssues::class)->create([
            'studentID' => $student->studentID,
            'issueID' => 1,
            'submissionData' => "{\"yearOfRequestedTransfer\":\"2016\",\"fromProgramCode\":\"I047\",\"fromProgramTitle\":\"Bachelor of Computer Science\",\"fromProgramIntakeYear\":\"2016\",\"toProgramCode\":\"BH-ERM\",\"toProgramTitle\":\"Business\",\"toProgramYear\":\"2016\",\"toReasons\":\"Sample to go Business\"}",
            'attachmentData' => ""
        ]);

        // login as coordinator
        $this->actingAs($user);

        // edit an existing requirement
        $this->json('DELETE', 'coordinator/resolveenrolmentissues/'. $student->studentID .'/issue/1')->seeJson([
            'status' => 'disapproved'
        ]);
    }

    // /**
    //  * PAGE Test
    //  * SUCCESS TEST
    //  * A test to remove existing graduationrequirements
    //  * Condition: The selected requirement has been added to the course
    //  * Environment: GraduationRequirements table contains an existing requirement
    //  */
    // public function testRemoveExistingRequirement()
    // {
    //     // Sample data - Course Coordinator
    //     $course = factory(App\Course::class)->create();
    //     $user = factory(App\User::class)->create([
    //         'permissionLevel' => '2',
    //         'password' => bcrypt('123456'),
    //     ]);
    //     $coordinator = factory(App\CourseCoordinator::class)->create([
    //         'username' => $user->username,
    //         'courseCode' => $course->courseCode
    //     ]);
    //
    //     // Sample Requirement
    //     $gradrequirement = factory(App\GraduationRequirements::class)->create([
    //         'courseCode' => $course->courseCode,
    //         // 'unitType' => 'Core', 'unitCount' => '20',
    //     ]);
    //
    //     // login as coordinator
    //     $this->actingAs($user);
    //
    //     // check before deleting the unit
    //     // Core still can be seen from <select>
    //     $this->visit('coordinator/graduationrequirements/create')
    //     ->see('20');
    //
    //     // delete the unit
    //     $this->json('DELETE', 'coordinator/graduationrequirements/Core');
    //
    //     // check if this unit has been removed
    //     $this->visit('coordinator/graduationrequirements/create')
    //     ->dontsee('20');
    // }
}
