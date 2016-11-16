<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\Course;
use App\Student;
use App\EnrolmentIssues;
use App\StudentEnrolmentIssues;
use App\CourseCoordinator;
use App\UnitListing;
use App\Unit;
use App\Config;
use Carbon\Carbon;

class LeaveOfAbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];

        $user = Auth::user(); // get user information

        // get user student and coordinator
        $data['student'] = Student::where('studentID', '=', $user->username)->first();
        $data['studentcourse'] = Course::where('courseCode', '=', $student->courseCode)->first();
        $data['coursecoordinator'] = CourseCoordinator::where('courseCode', '=', $student->courseCode)->first();

        // get previous, current and next year
        $data['currentyear'] = Carbon::now()->year;
        $data['nextyear'] = Carbon::now()->addYears(1)->year;
        $data['next2year'] = Carbon::now()->addYears(2)->year;

        return view('student.leaveofabsence', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->only([
            'issueID',
            'submissionData',
            'attachmentData'
        ]);

        // create and store enrolment issue
        $issue = new StudentEnrolmentIssues;
        $issue->studentID = Auth::user()->username;
        $issue->issueID = $input['issueID'];
        $issue->status = 'pending';
        $issue->submissionData = $input['submissionData'];
        $issue->attachmentData = $input['attachmentData'];
        $issue->save();

        return response()->json($issue);
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
