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
        $history = EnrolmentUnits::with('unit')
            ->where('studentID', '=', $id)
            ->where('grade', '=', 'pass')->get();
            // ^ maybe check grade instead of status
        $data['history'] = $history;

        $current = EnrolmentUnits::with('unit')
            ->where([
                ['studentID', '=', $id],
                ['year', '=', Config::find('year')->value],
                ['term', '=', Config::find('semester')->value],
            ])->get();
        $data['current'] = $current;

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

            $input = $request->only([
                'exemptionUnitCodePrior',
                'exemptionUnitYearPrior',
                'exemptionUnitTitlePrior',
                'soughtUnitCode',
                'soughtUnitTitle'
            ]);

            // update student course code
            $exemptionUnit = new EnrolmentUnits;
            $exemptionUnit->studentID = $studentID;
            $exemptionUnit->unitCode = $input['soughtUnitCode'];
            $exemptionUnit->year = $input['exemptionUnitYearPrior'];
            $exemptionUnit->term = 'skipped';
            $exemptionUnit->status = 'exempted';
            $exemptionUnit->grade = 'pass';
            $exemptionUnit->save();

            // update the issue
            $updateissue = StudentEnrolmentIssues::where('studentID', '=', $studentID)
                                                ->where('issueID', '=', $issueID)
                                                ->where('status', '=', 'pending')
                                                ->update(['status' => 'approved']);

        } else if ($issueID == '5') {

            $input = $request->only([
                'preclusionUnit',
                'prerequisiteUnit'
            ]);

            // update student enrolment units for the selected preclusion and its prerequisite
            $preclusionUnit = EnrolmentUnits::where('studentID', $studentID)
                                            ->where('unitCode', '=', $input['preclusionUnit'])
                                            ->update([
                                                'year' => Config::find('year')->value,
                                                'term' => Config::find('semester')->value,
                                                'status' => 'confirmed'
                                            ]);

            $prerequisiteUnit = EnrolmentUnits::where('studentID', $studentID)
                                            ->where('unitCode', '=', $input['prerequisiteUnit'])
                                            ->update([
                                                'year' => Config::find('year')->value,
                                                'term' => Config::find('semester')->value,
                                                'status' => 'confirmed'
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
        $updateissue = StudentEnrolmentIssues::where('studentID', '=', $studentID)
                    ->where('issueID', '=', $issueID)
                    ->where('status', '=', 'pending')
                    ->update(['status' => 'disapproved']);

        $issue = StudentEnrolmentIssues::where('studentID', '=', $studentID)
                                        ->where('issueID', '=', $issueID)->get();

        return response()->json($issue);
    }
}
