<?php

namespace App\Http\Controllers\Coordinator;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\StudentEnrolmentIssues;
use DB;

use App\User;
use App\Student;
use App\Course;
use App\Units;
use App\EnrolmentUnits;

class ResolveIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = StudentEnrolmentIssues::with('student', 'enrolment_issues')
                                        ->where('status', '=', 'pending')
                                        ->where('issueID', '=', '1')
                                        ->orwhere('issueID', '=', '2')->get();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        // Combine table Student (for Student Info), StudentEnrolmentIssues (for the submitted data)
        // and EnrolmentIssues (to get the type of the enrolment issues)
        $issues = StudentEnrolmentIssues::with('student', 'enrolment_issues')
                    ->where('status', '=', 'pending')->get();

        $data['issues'] = $issues;

        return view ('coordinator.resolveenrolmentissues', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * Approve button is pressed
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $studentID, $issueID)
    {
        $issue = StudentEnrolmentIssues::where('studentID', '=', $studentID)
                    ->where('issueID', '=', $issueID)
                    ->where('status', '=', 'pending')->get();

        if ($issueID === 1)
        {
            approve_1($request, $studentID);    // resolve course transfer issue
            $issue->status = 'approved';        // change the issue status to approved
            $issue->save();
        }

        else if ($issueID === 2)
        {
            approve_2($request, $studentID);    // approve exemption
            $issue->status = 'approved';        // change the issue status to approved
            $issue->save();
        }

        else if ($issueID === 3) {
            $issue->status = 'approved';
            $issue->save();
            approve_3($request, $studentID);    // approve program withdrawal
        }

        return response()->json($issueID);
    }

    /**
     * Remove the specified resource from storage.
     * Disapprove button is pressed
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($studentID, $issueID)
    {
        //
    }

    /**
     * Approve course transfer issue
     *
     * @param  \Illuminate\Http\Request  $request
     * @param string $studentID
     * @return \Illuminate\Http\Response
     */
    public function approve_1(Request $request, $studentID)
    {
        $input = $request->only([
            'proposedProgramCode',
            'proposedIntakeYear'
        ]);

        $student = Student::findOrFail($studentID);
        $student->courseCode = $input['proposedProgramCode'];
        // $student->year = $input['proposedIntakeYear']; // this not yet in database
        $student->save();
    }

    /**
     * Approve exemption issue
     *
     * @param  \Illuminate\Http\Request  $request
     * @param string $studentID
     * @return \Illuminate\Http\Response
     */
    public function approve_2(Request $request, $studentID)
    {
        $input = $request->only([
            'exemptionUnitCode',
            'exemptionYear',
        ]);

        $exemptionUnit = new EnrolmentUnits;
        $exemptionUnit->studentID = $studentID;
        $exemptionUnit->unitCode = $input['exemptionUnitCode'];
        $exemptionUnit->year = $input['exemptionYear'];
        $exemptionUnit->term = 'skipped';
        $exemptionUnit->status = 'exempted';
        $exemptionUnit->grade = 'pass';
        $exemptionUnit->save();
    }

    /**
     * Approve program withdrawal issue
     *
     * @param  \Illuminate\Http\Request  $request
     * @param string $studentID
     * @return \Illuminate\Http\Response
     */
    public function approve_3(Request $request, $studentID)
    {
        // remove the ability to login
        $login = User::findOrFail($studentID);
        $login->softDelete();

        // remove from students list
        $student = Student::findOrFail($studentID);
        $student->softDelete();
    }
}
