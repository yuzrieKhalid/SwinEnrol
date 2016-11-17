<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\StudentEnrolmentIssues;

class ResolveIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all leave of absence issues
        $data = StudentEnrolmentIssues::with('student', 'enrolment_issues')
                                ->where('status', '=', 'pending')
                                ->where('issueID', '=', '3')->get();
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

        return view('admin.resolveissues', $data);
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $studentID, $issueID)
    {
        // update issues status to approved
        $updateissue = StudentEnrolmentIssues::where('studentID', '=', $studentID)
                    ->where('issueID', '=', $issueID)
                    ->where('status', '=', 'pending')
                    ->update(['status' => 'approved']);

        // get and return updated issue
        $issue = StudentEnrolmentIssues::where('studentID', '=', $studentID)
                                        ->where('issueID', '=', $issueID)->get();

        return response()->json($issue);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($studentID, $issueID)
    {
        // update issue status to disapproved
        $updateissue = StudentEnrolmentIssues::where('studentID', '=', $studentID)
                    ->where('issueID', '=', $issueID)
                    ->where('status', '=', 'pending')
                    ->update(['status' => 'disapproved']);

        // get and return updated issue
        $issue = StudentEnrolmentIssues::where('studentID', '=', $studentID)
                                        ->where('issueID', '=', $issueID)->get();

        return response()->json($issue);
    }
}
