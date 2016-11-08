<?php

namespace App\Http\Controllers\Coordinator;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\Unit;
use App\Course;
use App\Requisite;
use App\StudyLevel;
use App\StudyPlanner;
use App\CourseCoordinator;

class ManageUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Search
        $input = $request->only(['search']);

        $data = [];
        $units = [];

        if ($input['search'] != "") {
            $units = Unit::where('unitCode', 'LIKE', '%'.$input['search'].'%')->get();
        } else {
            $units = Unit::get();
        }

        $data['units'] = $units;
        $data['studyLevels'] = StudyLevel::all();

        return view ('coordinator.manageunits', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Search
        $input = $request->only(['search']);

        $data = [];
        $units = [];

        $data['units'] = Unit::all();
        $data['studyLevels'] = StudyLevel::all();

        return view ('coordinator.manageunits_edit', $data);
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
            'creditPoints',
            'studyLevel'
        ]);

        // create and store unit
        $unit = new Unit;
        $unit->unitCode = $input['unitCode'];
        $unit->unitName = $input['unitName'];
        $unit->creditPoints = $input['creditPoints'];
        $unit->studyLevel = $input['studyLevel'];
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

        $data['unit'] = $unit;

        $data['studyLevels'] = StudyLevel::all();

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
            'creditPoints',
            'studyLevel'
        ]);

        $unit = Unit::findOrFail($id);
        $unit->unitCode = $input['unitCode'];
        $unit->unitName = $input['unitName'];
        $unit->creditPoints = $input['creditPoints'];
        $unit->studyLevel = $input['studyLevel'];
        $unit->save();

        return redirect('coordinator/manageunits');
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
