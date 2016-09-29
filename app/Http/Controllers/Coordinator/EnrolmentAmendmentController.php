<?php

namespace App\Http\Controllers\Coordinator;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\StudentEnrolmentIssues;
use App\EnrolmentUnits;
use App\Requisite;
use App\Unit;
use App\Config;

class EnrolmentAmendmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $amendment = StudentEnrolmentIssues::where('issueID', '=', 4)->get();

        return response()->json($amendment);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];

        $amendments = StudentEnrolmentIssues::with('student')
                    ->where('issueID', '=', 4)
                    ->where('status', '=', 'pending_add')
                    ->orwhere('status', '=', 'pending_drop')
                    ->get();
        $units = Unit::all();
        $requisites = Requisite::all();

        $data['amendments'] = $amendments;
        $data['units'] = $units;
        $data['requisites'] = $requisites;

        return view ('coordinator.enrolmentamendment', $data);
        // return response()->json($requisites)
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
     * When Approve button is clicked for pending_add and pending_drop
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $studentID
     * @param  string  $unitCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $studentID, $unitCode)
    {
        $input = $request->only([
            'status'
        ]);

        // approve the request
        if ($input['status'] == 'pending_add') {
            $amendmentissue = StudentEnrolmentIssues::where('studentID', '=', $studentID)
                            ->where('issueID', '=', 4)
                            ->where('attachmentData', '=', $unitCode)
                            ->update(['status' => 'approved']);

            $enrolmentunit = new EnrolmentUnits;
            $enrolmentunit->studentID = $studentID;
            $enrolmentunit->unitCode = $unitCode;
            $enrolmentunit->year = Config::find('year')->value;
            $enrolmentunit->term  = Config::find('semester')->value;
            $enrolmentunit->status = 'confirmed';
            $enrolmentunit->grade   = 'ungraded';
            $enrolmentunit->save();

            return response()->json($enrolmentunit);

        } else {

            $amendmentissue = StudentEnrolmentIssues::where('studentID', '=', $studentID)
                            ->where('issueID', '=', 4)
                            ->where('attachmentData', '=', $unitCode)
                            ->update(['status' => 'approved']);

            $enrolmentunit = EnrolmentUnits::where('studentID', '=', $studentID)
                                            ->where('unitCode', '=', $unitCode)
                                            ->update(['status' => 'dropped']);

            return response()->json($enrolmentunit);
        }

        // TODO: notify the students
        // ...
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($studentID, $unitCode)
    {
        // disapprove the request
        $amendmentissue = StudentEnrolmentIssues::where('studentID', '=', $studentID)
                        ->where('issueID', '=', 4)
                        ->where('attachmentData', '=', $unitCode)
                        ->update(['status' => 'disapproved']);

        // TODO: notify the students
        // ...

        return response()->json($amendmentissue);
    }
}
