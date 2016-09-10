<?php

namespace App\Http\Controllers\Coordinator;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Unit;
use App\Course;

class ManageUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Unit::all());
        // $data = [];
        // $units = Unit::all();
        //
        // $data['units'] = $units;
        //
        // return view ('coordinator.manageunits', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $units = Unit::get();

        $data['units'] = $units;

        return view ('coordinator.manageunits', $data);
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
            'unitCode',
            'unitName',
            'prerequisite',
            'corequisite',
            'antirequisite',
            'minimumCompletedUnits',
            'information'
        ]);

        $unit = new Unit;
        $unit->unitCode = $input['unitCode'];
        $unit->unitName = $input['unitName'];
        $unit->prerequisite = $input['prerequisite'];
        $unit->antirequisite = $input['antirequisite'];
        $unit->corequisite = $input['corequisite'];
        $unit->minimumCompletedUnits = (int) $input['minimumCompletedUnits'];
        $unit->information = $input['information'];
        $unit->save();

        return response()->json($unit);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [];
        $unit = Unit::findOrFail($id);
        $units = Unit::all();

        // used first() instead of get() because it is guaranteed to only come up with only one unique unit
        $prerequisite = Unit::where('unitCode', '=', $unit->prerequisite)->first();
        $corequisite = Unit::where('unitCode', '=', $unit->corequisite)->first();
        $antirequisite = Unit::where('unitCode', '=', $unit->antirequisite)->first();

        $data['unit'] = $unit;
        $data['units'] = $units;

        $data['prerequisite'] = $prerequisite;
        $data['corequisite'] = $corequisite;
        $data['antirequisite'] = $antirequisite;

        // extract data from unit information JSON
        $information = json_decode($unit->information);
        $convenor = $information[0]->convenor;
        $maxStudents = $information[1]->maxStudents;
        $lectureDuration = $information[2]->lectureDuration;
        $lectureGroups = $information[2]->lectureGroups;
        $lecturers = $information[2]->lecturers;
        $lecturers_count = $information[2]->lecturers_count;
        $tutorialDuration = $information[3]->tutorialDuration;
        $tutorialGroups = $information[3]->tutorialGroups;
        $tutors = $information[3]->tutors;
        $tutors_count = $information[3]->tutors_count;

        $data['convenor'] = $convenor;
        $data['maxStudents'] = $maxStudents;
        $data['lectureDuration'] = $lectureDuration;
        $data['lectureGroups'] = $lectureGroups;
        $data['lecturers'] = $lecturers;
        $data['lecturers_count'] = $lecturers_count;
        $data['tutorialDuration'] = $tutorialDuration;
        $data['tutorialGroups'] = $tutorialGroups;
        $data['tutors'] = $tutors;
        $data['tutors_count'] = $tutors_count;

        return view ('coordinator.manageunits_edit', $data);
        // return response()->json($information);
        // return response()->json($lecturers);
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
            'unitCode',
            'unitName',
            'prerequisite',
            'corequisite',
            'antirequisite',
            'minimumCompletedUnits',
            'information'
        ]);

        $unit = Unit::findOrFail($id);
        $unit->unitCode = $input['unitCode'];
        $unit->unitName = $input['unitName'];
        $unit->prerequisite = $input['prerequisite'];
        $unit->antirequisite = $input['antirequisite'];
        $unit->corequisite = $input['corequisite'];
        $unit->minimumCompletedUnits = $input['minimumCompletedUnits'];
        $unit->information = $input['information'];
        $unit->save();

        return response()->json($unit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();

        return response()->json($unit);
    }
}
