<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\EnrolmentDates;

class SetEnrolmentDateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = [];
        // $dates  = EnrolmentDates::all();
        //
        // $data['dates'] = $dates;
        //
        // return view ('admin.setenrolmentdates', $data);

        return response()->json(EnrolmentDates::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view ('admin.setenrolmentdates');
        $data = [];
        $dates  = EnrolmentDates::all();

        $data['dates'] = $dates;

        return view ('admin.setenrolmentdates', $data);
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
            'year',
            'level',
            'term',
            'reenrolmentOpenDate',
            'reenrolmentCloseDate',
            'adjustmentCloseDate',
            'examResultsRelease'
        ]);

        $enrolment = new EnrolmentDates;
        $enrolment->year = $input['year'];
        $enrolment->level = $input['level'];
        $enrolment->term = $input['term'];
        $enrolment->reenrolmentOpenDate = $input['reenrolmentOpenDate'];
        $enrolment->reenrolmentCloseDate = $input['reenrolmentCloseDate'];
        $enrolment->adjustmentCloseDate = $input['adjustmentCloseDate'];
        $enrolment->examResultsRelease = $input['examResultsRelease'];
        $enrolment->save();

        return response()->json($enrolment);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json($id);
        // return response()->json(EnrolmentDates::findOrFail($id)->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // there's no need for a specific page
        // we use the main set enrolment page to directly edit
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
        $input = $request->only([
            'year',
            'level',
            'term',
            'reenrolmentOpenDate',
            'reenrolmentCloseDate',
            'adjustmentCloseDate',
            'examResultsRelease'
        ]);

        $enrolment = EnrolmentDates::findOrFail($id);
        $enrolment->year = $input['year'];
        $enrolment->level = $input['level'];
        $enrolment->term = $input['term'];
        $enrolment->reenrolmentOpenDate = $input['reenrolmentOpenDate'];
        $enrolment->reenrolmentCloseDate = $input['reenrolmentCloseDate'];
        $enrolment->adjustmentCloseDate = $input['adjustmentCloseDate'];
        $enrolment->examResultsRelease = $input['examResultsRelease'];
        $enrolment->save();

        return response()->json($enrolment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enrolment = EnrolmentDates::findOrFail($id);
        $enrolment->delete();

        return response()->json($enrolment);
    }
}
