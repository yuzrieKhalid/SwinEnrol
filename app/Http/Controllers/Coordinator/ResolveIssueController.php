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
use App\Config;

class ResolveIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all enrolment issues except for leave of absence
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
        return view ('coordinator.resolveenrolmentissues');
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
        // get student's completed enrolment units
        $data['history'] = EnrolmentUnits::with('unit')
        ->where('studentID', '=', $id)
        ->where('grade', '=', 'pass')->get();

        // get current enrolment units
        $data['current'] = EnrolmentUnits::with('unit')
        ->where([
            ['studentID', '=', $id],
            ['year', '=', Config::find('year')->value],
            ['semester', '=', Config::find('semester')->value],
        ])->get();

        return response()->json($data);
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
            // course transfer
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

        } else if ($issueID == '2') {
            // exemption
            $input = $request->only([
                'exemptionUnitCode',
                'exemptionYear',
            ]);

            // update student course code
            $exemptionUnit = new EnrolmentUnits;
            $exemptionUnit->studentID = $studentID;
            $exemptionUnit->unitCode = $input['exemptionUnitCode'];
            $exemptionUnit->year = $input['exemptionYear'];
            $exemptionUnit->semester = 'skipped';
            $exemptionUnit->status = 'exempted';
            $exemptionUnit->grade = 'pass';
            $exemptionUnit->save();

            // update the issue
            $updateissue = StudentEnrolmentIssues::where('studentID', '=', $studentID)
            ->where('issueID', '=', $issueID)
            ->where('status', '=', 'pending')
            ->update(['status' => 'approved']);

        } else if ($issueID == '5') {
            // preclusion
            $input = $request->only([
                'preclusionUnit',
                'prerequisiteUnit'
            ]);

            // student must have enrolled both units first
            // update student enrolment units for the selected preclusion and its prerequisite
            $preclusionUnit = EnrolmentUnits::create([
                'studentID' => $studentID,
                'unitCode' => $input['preclusionUnit'],
                'year' => Config::find('year')->value,
                'semester' => Config::find('semester')->value,
                'status' => 'confirmed',
                'grade' => 'ungraded'
            ]);

            $prerequisiteUnit = EnrolmentUnits::create([
                'studentID' => $studentID,
                'unitCode' => $input['prerequisiteUnit'],
                'year' => Config::find('year')->value,
                'semester' => Config::find('semester')->value,
                'status' => 'confirmed',
                'grade' => 'ungraded'
            ]);

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
        // disapprove selected issue
        $updateissue = StudentEnrolmentIssues::where('studentID', '=', $studentID)
        ->where('issueID', '=', $issueID)
        ->where('status', '=', 'pending')
        ->update(['status' => 'disapproved']);

        $issue = StudentEnrolmentIssues::where('studentID', '=', $studentID)
        ->where('issueID', '=', $issueID)->get();

        return response()->json($issue);
    }
}
