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
                                        ->where('issueID', '!=', '3')->get();
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
        if ($issueID == '1')
        {
            $input = $request->only([
                'proposedProgramCode',
                'proposedIntakeYear'
            ]);

            // update student course code
            $student = Student::where('studentID', '=', $studentID)
                                ->update([
                                    'courseCode' => $input['proposedProgramCode'],
                                    'year' => $input['proposedIntakeYear']
                                ]);

            // update the issue
            $updateissue = StudentEnrolmentIssues::where('studentID', '=', $studentID)
                                                ->where('issueID', '=', $issueID)
                                                ->where('status', '=', 'pending')
                                                ->update(['status' => 'approved']);

        } else {

            $input = $request->only([
                'exemptionUnitCode',
                'exemptionYear'
            ]);

            // update student course code
            $exemptionUnit = new EnrolmentUnits;
            $exemptionUnit->studentID = $studentID;
            $exemptionUnit->unitCode = $input['exemptionUnitCode'];
            $exemptionUnit->year = $input['exemptionYear'];
            $exemptionUnit->term = 'skipped';
            $exemptionUnit->status = 'exempted';
            $exemptionUnit->grade = 'pass';
            $exemptionUnit->save();

            // update the issue
            $updateissue = StudentEnrolmentIssues::where('studentID', '=', $studentID)
                                                ->where('issueID', '=', $issueID)
                                                ->where('status', '=', 'pending')
                                                ->update(['status' => 'approved']);

        }

        $issue = StudentEnrolmentIssues::where('studentID', '=', $studentID)
                                        ->where('issueID', '=', $issueID)->get();

        return response()->json($issue);
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
        $updateissue = StudentEnrolmentIssues::where('studentID', '=', $studentID)
                    ->where('issueID', '=', $issueID)
                    ->where('status', '=', 'pending')
                    ->update(['status' => 'disapproved']);

        $issue = StudentEnrolmentIssues::where('studentID', '=', $studentID)
                                        ->where('issueID', '=', $issueID)->get();

        return response()->json($issue);
    }
}
