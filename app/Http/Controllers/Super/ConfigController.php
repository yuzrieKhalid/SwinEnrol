<?php

namespace App\Http\Controllers\Super;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Config;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['config'] = Config::all();

        return view('super.config', $data);
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
            'enrolmentPhase',
            'semester',
            'year',
            'semesterLength'
        ]);

        $data['status'] = true;

        // Enrolment Phase
        $enrolmentPhase = Config::find('enrolmentPhase');
        $enrolmentPhase->value = $input['enrolmentPhase'];
        $enrolmentPhaseVal = intval($input['enrolmentPhase']);
        if($enrolmentPhaseVal < 1 || $enrolmentPhaseVal > 3)
        {
            $data['status'] = false;
            $data['epMessage'] = 'Enrolment Phase must be between values 1 and 3.';
        }

        // Semester
        $semester = Config::find('semester');
        $semester->value = $input['semester'];

        // Semester Length
        $semesterLength = Config::find('semesterLength');
        $semesterLength->value = $input['semesterLength'];
        $semesterLengthVal = intval($input['semesterLength']);
        if($semesterLengthVal < 1)
        {
            $data['status'] = false;
            $data['slMessage'] = 'Semester Length must be a number greater than 0.';
        }

        // Year
        $year = Config::find('year');
        $year->value = $input['year'];
        $yearVal = intval($input['year']);
        if($yearVal < 1)
        {
            $data['status'] = false;
            $data['yMessage'] = 'Year must be a number greater than 0.';
        }

        // save changes
        if($data['status'] == true)
        {

            $enrolmentPhase->save();
            $semester->save();
            $semesterLength->save();
            $year->save();
        }

        $data['config'] = Config::all();

        return view('super.config', $data);
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
