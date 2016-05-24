<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\Student;
use App\Unit;
use App\EnrolmentUnits;
use DB;

// student's unit operation is different. it should only add units to student's info

class ManageUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return response()->json();
        $data = [];

        $user = Auth::user();
        $student = Student::where('studentID', '=', '$user->username')->get();
        $data['student'] = $student;
        // get units for student
        // $units = DB::table('enrolment_units')
        //     ->join('unit', 'unit.unitCode', '=', 'enrolment_units.unitCode')
        //     ->select('enrolment_units.*', 'unit.unitName')
        //     // ->where('studentID', '=', $studentID) // need to check for current term too
        //     ->get();

        // need to rename it later to not confused
        $enrolled = EnrolmentUnits::with('unit')->where('studentID', '=', $user->username)->get();
        $data['enrolled'] = $enrolled;

        $units = Unit::all();
        $data['units'] = $units;

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

        $user = Auth::user();
        $student = Student::where('studentID', '=', '$user->username')->get();
        $data['student'] = $student;
        // get units for student
        // $units = DB::table('enrolment_units')
        //     ->join('unit', 'unit.unitCode', '=', 'enrolment_units.unitCode')
        //     ->select('enrolment_units.*', 'unit.unitName')
        //     // ->where('studentID', '=', $studentID) // need to check for current term too
        //     ->get();

        $enrolled = EnrolmentUnits::with('unit')->where('studentID', '=', $user->username)->get();
        $data['enrolled'] = $enrolled;

        $units = Unit::all();
        $data['units'] = $units;

        return view ('student.manageunits', $data);
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
            // enrolment data
            'unitCode',
        ]);

        $new_unit_enrolment = new EnrolmentUnits;
        $new_unit_enrolment->studentID = Auth::user()->username;
        $new_unit_enrolment->unitCode = $input['unitCode'];
        $new_unit_enrolment->year = 2016;
        $new_unit_enrolment->term = '2';
        $new_unit_enrolment->status = 'pending';
        $new_unit_enrolment->result = '0.00';
        $new_unit_enrolment->grade = '0.00';
        $new_unit_enrolment->save();

        return response()->json($new_unit_enrolment);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return response()->json();
        $data = [];

        // get units for student
        $units = DB::table('enrolment_units')
            ->join('unit', 'unit.unitCode', '=', 'enrolment_units.unitCode')
            ->select('enrolment_units.*', 'unit.unitName')
            // ->where('studentID', '=', $studentID) // need to check for current term too
            ->findOrFail($id);

        $data['units'] = $units;

        return view ('student.manageunits', $data);
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
