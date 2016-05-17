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
        $units = Unit::all();
        $courses = Course::all();

        $data['units'] = $units;
        $data['courses'] = $courses;

        // since its the same page as index, need to check for the $units
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
            'courseCode',
            'core',
            'prerequisite',
            'corequisite',
            'antirequisite',
            'minimumCompletedUnits'
        ]);

        $unit = new Unit;
        $unit->unitCode = $input['unitCode'];
        $unit->unitName = $input['unitName'];
        $unit->courseCode = $input['courseCode'];
        $unit->prerequisite = $input['prerequisite'];
        $unit->antirequisite = $input['antirequisite'];
        $unit->corequisite = $input['corequisite'];
        $unit->minimumCompletedUnits = (int) $input['minimumCompletedUnits'];
        $unit->core = $input['core'];
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
        $courses = Course::all();

        $data['unit'] = $unit;
        $data['units'] = $units;
        $data['courses'] = $courses;
        return view ('coordinator.manageunits', $data);
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
            'courseCode',
            'core',
            'prerequisite',
            'corequisite',
            'antirequisite',
            'minimumCompletedUnits'
        ]);

        $unit = Unit::findOrFail($id);
        $unit->unitCode = $input['unitCode'];
        $unit->unitName = $input['unitName'];
        $unit->courseCode = $input['courseCode'];
        $unit->prerequisite = $input['prerequisite'];
        $unit->antirequisite = $input['antirequisite'];
        $unit->corequisite = $input['corequisite'];
        $unit->minimumCompletedUnits = $input['minimumCompletedUnits'];
        $unit->core = $input['core'];
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
