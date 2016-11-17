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

    // COURSE TRANSFER
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
        $this->json('DELETE', 'coordinator/resolveenrolmentissues/'. $student->studentID .'/issue/1')
        ->seeJson([
            'status' => 'disapproved'
        ]);
    }

    // EXEMPTION (ADVANCED STANDING)
    /**
     * JSON API Test
     * SUCCESS TEST
     * A test to submit Exemption [by Student]
     * Condition: Exemption Form has not yet been submitted even once
     * Environment: Exemption Form has not yet been submitted even once
     */
    public function testStudentSubmitExemption()
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

        // submit exemption form and see if the form has been submitted
        $this->json('POST', 'student/exemption', [
            'issueID' => 2,
            'submissionData' => "{\"fromProgramCode\":\"\",\"fromProgramTitle\":\"\",\"soughtUnitCode\":\"COS10009\",\"soughtUnitTitle\":\"asd\",\"exemptionUnitCodePrior\":\"TEST1\",\"exemptionUnitYearPrior\":\"2015\",\"exemptionUnitTitlePrior\":\"qwe\"}",
            'attachmentData' => ''
        ])->seeJson([
            'studentID' => $student->studentID,
            'issueID' => 2,
            'status' => 'pending'
        ]);
    }

    /**
     * PAGE Test
     * SUCCESS TEST
     * A test to approve Exemption submitted by Student [by Coordinator]
     * Condition: Exemption Form has been submitted from student
     * Environment: Exemption Form has been submitted from student
     */
    public function testApproveExemptionRequest()
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

        // Sample Exemption Issue
        $exemption = factory(App\StudentEnrolmentIssues::class)->create([
            'studentID' => $student->studentID,
            'issueID' => 2,
            'submissionData' => "{\"fromProgramCode\":\"\",\"fromProgramTitle\":\"\",\"soughtUnitCode\":\"COS10009\",\"soughtUnitTitle\":\"asd\",\"exemptionUnitCodePrior\":\"TEST1\",\"exemptionUnitYearPrior\":\"2015\",\"exemptionUnitTitlePrior\":\"qwe\"}",
            'attachmentData' => ''
        ]);

        // login as coordinator
        $this->actingAs($user);

        // approve exemption
        $this->json('PUT', 'coordinator/resolveenrolmentissues/'. $student->studentID .'/issue/2', [
            'exemptionUnitCode' => 'COS10009',
            'exemptionYear' => '2015'
        ])->seeJson([
            'status' => 'approved'
        ]);
    }

    /**
     * PAGE Test
     * SUCCESS TEST
     * A test to disapprove Exemption submitted by Student [by Coordinator]
     * Condition: Exemption Form has been submitted from student
     * Environment: Exemption Form has been submitted from student
     */
    public function testDisapproveExemptionRequest()
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

        // Sample Exemption Issue
        $exemption = factory(App\StudentEnrolmentIssues::class)->create([
            'studentID' => $student->studentID,
            'issueID' => 2,
            'submissionData' => "{\"fromProgramCode\":\"\",\"fromProgramTitle\":\"\",\"soughtUnitCode\":\"COS10009\",\"soughtUnitTitle\":\"asd\",\"exemptionUnitCodePrior\":\"TEST1\",\"exemptionUnitYearPrior\":\"2015\",\"exemptionUnitTitlePrior\":\"qwe\"}",
            'attachmentData' => ''
        ]);

        // login as coordinator
        $this->actingAs($user);

        // disapprove exemption
        $this->json('DELETE', 'coordinator/resolveenrolmentissues/'. $student->studentID .'/issue/2')
        ->seeJson([
            'status' => 'disapproved'
        ]);
    }

    // LEAVE OF ABSENCE
    /**
     * JSON API Test
     * SUCCESS TEST
     * A test to submit Leave of Absence [by Student]
     * Condition: Leave of Absence Form has not yet been submitted even once
     * Environment: Leave of Absence Form has not yet been submitted even once
     */
    public function testStudentSubmitLeaveOfAbsence()
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
        $this->json('POST', 'student/leaveofabsence', [
            'issueID' => 3,
            'submissionData' => "{\"fromProgramCode\":\"I047\",\"fromProgramTitle\":\"Bachelor of Computer Science\",\"isForeigner\":\"YES\",\"iso_name\":\"Mr Ehwan\",\"period_from\":\"07 November 2016\",\"period_to\":\"09 December 2016\",\"reasonForLOA\":\"Family circumstances\"}",
            'attachmentData' => "",
        ])->seeJson([
            'studentID' => $student->studentID,
            'issueID' => 3,
            'status' => 'pending'
        ]);
    }

    /**
     * PAGE Test
     * SUCCESS TEST
     * A test to approve Leave of Absence submitted by Student [by Admin]
     * Condition: Leave of Absence Form has been submitted from student
     * Environment: Leave of Absence Form has been submitted from student
     */
    public function testApproveLeaveOfAbsenceRequest()
    {
        // Sample data - Course Coordinator
        $course = factory(App\Course::class)->create();
        $user = factory(App\User::class)->create([
            'permissionLevel' => '3',
            'password' => bcrypt('123456'),
        ]);
        $student = factory(App\Student::class)->create([
            'studentID' => $user->username,
            'courseCode' => $course->courseCode
        ]);

        // Sample Leave of Absence Issue
        $leaveofabsence = factory(App\StudentEnrolmentIssues::class)->create([
            'studentID' => $student->studentID,
            'issueID' => 3,
            'submissionData' => "{\"fromProgramCode\":\"I047\",\"fromProgramTitle\":\"Bachelor of Computer Science\",\"isForeigner\":\"YES\",\"iso_name\":\"Mr Ehwan\",\"period_from\":\"07 November 2016\",\"period_to\":\"09 December 2016\",\"reasonForLOA\":\"Family circumstances\"}",
            'attachmentData' => "",
        ]);

        // login as coordinator
        $this->actingAs($user);

        // edit an existing requirement
        $this->json('PUT', 'admin/resolveenrolmentissues/'. $student->studentID .'/issue/3')
        ->seeJson([
            'status' => 'approved'
        ]);
    }

    /**
     * PAGE Test
     * SUCCESS TEST
     * A test to disapprove Leave Of Absence submitted by Student [by Admin]
     * Condition: Leave Of Absence Form has been submitted from student
     * Environment: Leave Of Absence Form has been submitted from student
     */
    public function testDisapproveLeaveOfAbsenceRequest()
    {
        // Sample data - Course Coordinator
        $course = factory(App\Course::class)->create();
        $user = factory(App\User::class)->create([
            'permissionLevel' => '3',
            'password' => bcrypt('123456'),
        ]);
        $student = factory(App\Student::class)->create([
            'studentID' => $user->username,
            'courseCode' => $course->courseCode
        ]);

        // Sample Leave of Absence Issue
        $leaveofabsence = factory(App\StudentEnrolmentIssues::class)->create([
            'studentID' => $student->studentID,
            'issueID' => 3,
            'submissionData' => "{\"fromProgramCode\":\"I047\",\"fromProgramTitle\":\"Bachelor of Computer Science\",\"isForeigner\":\"YES\",\"iso_name\":\"Mr Ehwan\",\"period_from\":\"07 November 2016\",\"period_to\":\"09 December 2016\",\"reasonForLOA\":\"Family circumstances\"}",
            'attachmentData' => "",
        ]);

        // login as coordinator
        $this->actingAs($user);

        // edit an existing requirement
        $this->json('DELETE', 'admin/resolveenrolmentissues/'. $student->studentID .'/issue/3')
        ->seeJson([
            'status' => 'disapproved'
        ]);
    }
}
