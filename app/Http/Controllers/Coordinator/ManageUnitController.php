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
        $unit = Unit::all();
        $unitCode = $request->input('unitCode');

        if(!empty($unitCode)){
          $unit->where('unitCode', 'LIKE', '%'.$unitCode.'%')->get();
        }


        //$unit = Unit::all();
        return response()->json($unit->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];

        $courseCode = Course::all();
        $units = Unit::get();

        $data['units'] = $units;
        $data['studyLevels'] = StudyLevel::all();

        return view ('coordinator.manageunits', $data);
    }
    public function search()
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
            'unitCode',
            'unitName',
            'prerequisite',
            'corequisite',
            'antirequisite',
            'creditPoints',
            'maxStudentCount',
            'lectureGroupCount',
            'lectureDuration',
            'tutorialGroupCount',
            'tutorialDuration',
            'unitInfo',
            'studyLevel'
        ]);

        // create and store unit
        $unit = new Unit;
        $unit->unitCode = $input['unitCode'];
        $unit->unitName = $input['unitName'];
        $unit->creditPoints = $input['creditPoints'];
        $unit->maxStudentCount = (int) $input['maxStudentCount'];
        $unit->lectureGroupCount = $input['lectureGroupCount'];
        $unit->lectureDuration = $input['lectureDuration'];
        $unit->tutorialGroupCount = (int) $input['tutorialGroupCount'];
        $unit->tutorialDuration = $input['tutorialDuration'];
        $unit->unitInfo = $input['unitInfo'];
        $unit->studyLevel = $input['studyLevel'];
        $unit->save();

        // create and store prerequisites
        if(count($input['prerequisite']) > 0)
        {
            $index = 0; // index for prerequisites
            // loop through prerequisite group
            foreach($input['prerequisite_groups'] as $prerequisiteGroup)
            {
                // loop through prerequisites in group
                foreach($prerequisiteGroup as $prerequisite)
                {
                    // create new prerequisite
                    $requisite = new Requisite;
                    $requisite->unitCode = $input['unitCode'];
                    $requisite->requisite = $prerequisite->requisite;
                    $type = $prerequisite->type[0];
                    // join prerequisite type with unit count if exists
                    if(count($prerequisite->type) > 1)
                        $type = $type.' '.$prerequisite->type[1];
                    $requisite->type = $type;
                    $requisite->index = $index;
                    $requisite->save();
                }

                $index++; // increment index
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
        $data['i'] = 0;

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
            'prerequisite_groups',
            'corequisite',
            'antirequisite',
            'creditPoints',
            'maxStudentCount',
            'lectureGroupCount',
            'lectureDuration',
            'tutorialGroupCount',
            'tutorialDuration',
            'unitInfo',
            'studyLevel'
        ]);

        // update unit details
        $unit = Unit::findOrFail($id);
        $unit->unitCode = $input['unitCode'];
        $unit->unitName = $input['unitName'];
        $unit->creditPoints = $input['creditPoints'];
        $unit->maxStudentCount = (int) $input['maxStudentCount'];
        $unit->lectureGroupCount = $input['lectureGroupCount'];
        $unit->lectureDuration = $input['lectureDuration'];
        $unit->tutorialGroupCount = (int) $input['tutorialGroupCount'];
        $unit->tutorialDuration = $input['tutorialDuration'];
        $unit->unitInfo = $input['unitInfo'];
        $unit->studyLevel = $input['studyLevel'];
        $unit->save();

        // drop old requisites
        Requisite::where('unitCode', '=', $id)->delete();

        // create and store prerequisites
        if(count($input['prerequisite']) > 0)
        {
            $index = 0; // index for prerequisites
            // loop through prerequisite group
            foreach($input['prerequisite_groups'] as $prerequisiteGroup)
            {
                // loop through prerequisites in group
                foreach($prerequisiteGroup as $prerequisite)
                {
                    // create new prerequisite
                    $requisite = new Requisite;
                    $requisite->unitCode = $input['unitCode'];
                    $requisite->requisite = $prerequisite->requisite;
                    $type = $prerequisite->type[0];
                    // join prerequisite type with unit count if exists
                    if(count($prerequisite->type) > 1)
                        $type = $type.' '.$prerequisite->type[1];
                    $requisite->type = $type;
                    $requisite->index = $index;
                    $requisite->save();
                }

                $index++; // increment index
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
