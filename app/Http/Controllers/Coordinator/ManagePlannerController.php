<?php

namespace App\Http\Controllers\Coordinator;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\StudyPlanner;
use DB;

class ManagePlannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(StudyPlanner::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $units = DB::table('study_planner')
            ->join('unit', 'study_planner.unitCode', '=', 'unit.unitCode')
            ->select('study_planner.*', 'unit.unitName')
            ->get();
        $data['units'] = $units;

        return view ('coordinator.managestudyplanner', $data);
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
            'courseCode',
            'unitCode',
            'year',
            'term',
        ]);

        $planner = new StudyPlanner;
        $planner->courseCode = $input['courseCode'];
        $planner->unitCode = $input['unitCode'];
        $planner->year = $input['year'];
        $planner->term = $input['term'];
        $planner->save();

        return response()->json($planner);
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
        return view ('coordinator.managestudyplanner');
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
            'courseCode',
            'unitCode',
            'year',
            'term',
        ]);

        $planner = StudyPlanner::findOrFail($id);
        $planner->courseCode = $input['courseCode'];
        $planner->unitCode = $input['unitCode'];
        $planner->year = $input['year'];
        $planner->term = $input['term'];
        $planner->save();

        return response()->json($planner);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $planner = StudyPlanner::findOrFail($id);
        $planner->delete();

        return response()->json($planner);
    }
}
