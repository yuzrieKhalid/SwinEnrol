<?php

namespace App\Http\Controllers\Coordinator;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\StudentEnrolmentIssues;
use App\EnrolmentUnits;
use App\Unit;

class EnrolmentAmendmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $amendment = EnrolmentUnits::with('unit', 'student')
                        ->where('status', '=', 'pending')->get();

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

        $amendment = EnrolmentUnits::with('unit', 'student')
                        ->where('status', '=', 'pending')->get();

        $data['amendment'] = $amendment;

        return view ('coordinator.enrolmentamendment', $data);
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
    public function update(Request $request, $studentID, $unitCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($studentID, $unitCode)
    {
        //
    }

    /**
     * Approve button
     *
     * @return \Illuminate\Http\Response
     */
    public function approve()
    {

    }

    /**
     * Disapprove button
     *
     * @return \Illuminate\Http\Response
     */
    public function disapprove()
    {

    }
}
