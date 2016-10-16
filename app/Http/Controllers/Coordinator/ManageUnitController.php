<?php

namespace App\Http\Controllers\Coordinator;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Unit;
use App\Course;
use App\Requisite;

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

        // create and store unit
        $unit = new Unit;
        $unit->unitCode = $input['unitCode'];
        $unit->unitName = $input['unitName'];
        $unit->minimumCompletedUnits = (int) $input['minimumCompletedUnits'];
        $unit->maxStudentCount = (int) $input['maxStudentCount'];
        $unit->lectureGroupCount = $input['lectureGroupCount'];
        $unit->lectureDuration = $input['lectureDuration'];
        $unit->tutorialGroupCount = (int) $input['tutorialGroupCount'];
        $unit->tutorialDuration = $input['tutorialDuration'];
        $unit->unitInfo = $input['unitInfo'];
        $unit->save();

        // create and store prerequisites
        if(count($input['prerequisite']) > 0)
        {
            foreach($input['prerequisite'] as $prerequisite)
            {
                $requisite = new Requisite;
                $requisite->unitCode = $input['unitCode'];
                $requisite->requisite = $prerequisite;
                $requisite->type = 'prerequisite';
                $requisite->conjunction = 'AND';
                $requisite->save();
            }
        }

        // create and store corequisites
        if(count($input['corequisite']) > 0)
        {
            foreach($input['corequisite'] as $corequisite)
            {
                $requisite = new Requisite;
                $requisite->unitCode = $input['unitCode'];
                $requisite->requisite = $corequisite;
                $requisite->type = 'corequisite';
                $requisite->conjunction = 'OR';
                $requisite->save();
            }
        }

        // create and store antirequisites
        if(count($input['antirequisite']) > 0)
        {
            foreach($input['antirequisite'] as $antirequisite)
            {
                $requisite = new Requisite;
                $requisite->unitCode = $input['unitCode'];
                $requisite->requisite = $antirequisite;
                $requisite->type = 'antirequisite';
                $requisite->conjunction = 'OR';
                $requisite->save();
            }
        }

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

        $data['unit'] = $unit;
        $data['units'] = $units;

        // get requisites
        $requisites = Requisite::where('unitCode', '=', $unit->unitCode)->get();

        // sort requisites
        foreach($requisites as $requisite)
        {
            if($requisite->type == 'corequisite')
                $data['corequisites'][] = $requisite;
            if($requisite->type == 'antirequisite')
                $data['antirequisites'][] = $requisite;
            else
            {
                $requisite->type = explode(' ', $requisite->type); // split type into array
                $data['prerequisites'][$requisite->index][] = $requisite;
            }
        }

        // variable for for loop
        // $data['i'] = 0;

        // get prerequisite highest index
        $data['index'] = Requisite::where('unitCode', '=', $unit->unitCode)->max('index');

        // return response()->json($data['prerequisites']);

        // extract data from unit information JSON
        $unitInfo = json_decode($unit->unitInfo);
        $convenor = $unitInfo[0]->convenor;
        $lecturers = $unitInfo[1]->lecturers;
        $lecturers_count = $unitInfo[1]->lecturers_count;
        $tutors = $unitInfo[2]->tutors;
        $tutors_count = $unitInfo[2]->tutors_count;

        $data['convenor'] = $convenor;
        $data['maxStudents'] = $unit->maxStudentCount;
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
        $unit->minimumCompletedUnits = (int) $input['minimumCompletedUnits'];
        $unit->maxStudentCount = (int) $input['maxStudentCount'];
        $unit->lectureGroupCount = $input['lectureGroupCount'];
        $unit->lectureDuration = $input['lectureDuration'];
        $unit->tutorialGroupCount = (int) $input['tutorialGroupCount'];
        $unit->tutorialDuration = $input['tutorialDuration'];
        $unit->unitInfo = $input['unitInfo'];
        $unit->save();

        // drop old requisites
        Requisite::where('unitCode', '=', $id)->delete();

        // create and store prerequisites
        if(count($input['prerequisite']) > 0)
        {
            foreach($input['prerequisite'] as $prerequisite)
            {
                $requisite = new Requisite;
                $requisite->unitCode = $input['unitCode'];
                $requisite->requisite = $prerequisite;
                $requisite->type = 'prerequisite';
                $requisite->conjunction = 'AND';
                $requisite->save();
            }
        }

        // create and store corequisites
        if(count($input['corequisite']) > 0)
        {
            foreach($input['corequisite'] as $corequisite)
            {
                $requisite = new Requisite;
                $requisite->unitCode = $input['unitCode'];
                $requisite->requisite = $corequisite;
                $requisite->type = 'corequisite';
                $requisite->conjunction = 'OR';
                $requisite->save();
            }
        }

        // create and store antirequisites
        if(count($input['antirequisite']) > 0)
        {
            foreach($input['antirequisite'] as $antirequisite)
            {
                $requisite = new Requisite;
                $requisite->unitCode = $input['unitCode'];
                $requisite->requisite = $antirequisite;
                $requisite->type = 'antirequisite';
                $requisite->conjunction = 'OR';
                $requisite->save();
            }
        }

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
