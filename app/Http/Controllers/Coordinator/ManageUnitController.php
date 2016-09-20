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
            'maxStudentCount',
            'lectureGroupCount',
            'lectureDuration',
            'tutorialGroupCount',
            'tutorialDuration',
            'unitInfo'
        ]);

        $unit = new Unit;
        $unit->unitCode = $input['unitCode'];
        $unit->unitName = $input['unitName'];
        $unit->prerequisite = $input['prerequisite'];
        $unit->antirequisite = $input['antirequisite'];
        $unit->corequisite = $input['corequisite'];
        $unit->minimumCompletedUnits = (int) $input['minimumCompletedUnits'];
        $unit->maxStudentCount = (int) $input['maxStudentCount'];
        $unit->lectureGroupCount = $input['lectureGroupCount'];
        $unit->lectureDuration = $input['lectureDuration'];
        $unit->tutorialGroupCount = (int) $input['tutorialGroupCount'];
        $unit->tutorialDuration = $input['tutorialDuration'];
        $unit->unitInfo = $input['unitInfo'];
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
        $unitInfo = json_decode($unit->unitInfo);
        $convenor = $unitInfo[0]->convenor;
        $lecturers = $unitInfo[1]->lecturers;
        $lecturers_count = $unitInfo[1]->lecturers_count;
        $tutors = $unitInfo[2]->tutors;
        $tutors_count = $unitInfo[2]->tutors_count;

        $data['convenor'] = $convenor;
        $data['maxStudents'] = $unit->maxStudents;
        $data['lectureDuration'] = $unit->lectureDuration;
        $data['lectureGroupCount'] = $unit->lectureGroupCount;
        $data['lecturers'] = $lecturers;
        $data['lecturers_count'] = $lecturers_count;
        $data['tutorialDuration'] = $unit->tutorialDuration;
        $data['tutorialGroupCount'] = $unit->tutorialGroupCount;
        $data['tutors'] = $tutors;
        $data['tutors_count'] = $tutors_count;

        return view ('coordinator.manageunits_edit', $data);
        // return response()->json($unitInfo);
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
            'maxStudentCount',
            'lectureGroupCount',
            'lectureDuration',
            'tutorialGroupCount',
            'tutorialDuration',
            'unitInfo'
        ]);

        $unit = Unit::findOrFail($id);
        $unit->unitCode = $input['unitCode'];
        $unit->unitName = $input['unitName'];
        $unit->prerequisite = $input['prerequisite'];
        $unit->antirequisite = $input['antirequisite'];
        $unit->corequisite = $input['corequisite'];
        $unit->minimumCompletedUnits = (int) $input['minimumCompletedUnits'];
        $unit->maxStudentCount = (int) $input['maxStudentCount'];
        $unit->lectureGroupCount = $input['lectureGroupCount'];
        $unit->lectureDuration = $input['lectureDuration'];
        $unit->tutorialGroupCount = (int) $input['tutorialGroupCount'];
        $unit->tutorialDuration = $input['tutorialDuration'];
        $unit->unitInfo = $input['unitInfo'];
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
