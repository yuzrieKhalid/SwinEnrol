<?php

namespace App\Http\Controllers\Coordinator;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Carbon\Carbon;
use App\GraduationRequirements;
use App\CourseCoordinator;

class GraduationRequirementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];

        // Get the coordinator's username and courseCode
        $user = Auth::user();
        $courseCode = CourseCoordinator::where('username', '=', $user->username)->first()->courseCode;

        // check if entry exist; if not, create entry with default value 0
        if ( !empty(GraduationRequirements::where('courseCode', '=', $courseCode)->where('unitType', '=', 'Core')->first()) )
            $core = GraduationRequirements::where('courseCode', '=', $courseCode)->where('unitType', '=', 'Core')->first()->unitCount;
        else {
            $type_core = new GraduationRequirements;
            $type_core->courseCode = $courseCode;
            $type_core->unitType = 'Core';
            $type_core->unitCount = 0;
            $type_core->created_at = Carbon::now();
            $type_core->save();

            $core = $type_core->unitCount;
        }

        if ( !empty(GraduationRequirements::where('courseCode', '=', $courseCode)->where('unitType', '=', 'Elective')->first()) )
            $elective = GraduationRequirements::where('courseCode', '=', $courseCode)->where('unitType', '=', 'Elective')->first()->unitCount;
        else {
            $type_elective = new GraduationRequirements;
            $type_elective->courseCode = $courseCode;
            $type_elective->unitType = 'Elective';
            $type_elective->unitCount = 0;
            $type_elective->created_at = Carbon::now();
            $type_elective->save();

            $elective = $type_elective->unitCount;
        }

        if ( !empty(GraduationRequirements::where('courseCode', '=', $courseCode)->where('unitType', '=', 'Major')->first()) )
            $major = GraduationRequirements::where('courseCode', '=', $courseCode)->where('unitType', '=', 'Major')->first()->unitCount;
        else {
            $type_major = new GraduationRequirements;
            $type_major->courseCode = $courseCode;
            $type_major->unitType = 'Major';
            $type_major->unitCount = 0;
            $type_major->created_at = Carbon::now();
            $type_major->save();

            $major = $type_major->unitCount;
        }

        if ( !empty(GraduationRequirements::where('courseCode', '=', $courseCode)->where('unitType', '=', 'Minor')->first()) )
            $minor = GraduationRequirements::where('courseCode', '=', $courseCode)->where('unitType', '=', 'Minor')->first()->unitCount;
        else {
            $type_minor = new GraduationRequirements;
            $type_minor->courseCode = $courseCode;
            $type_minor->unitType = 'Minor';
            $type_minor->unitCount = 0;
            $type_minor->created_at = Carbon::now();
            $type_minor->save();

            $minor = $type_minor->unitCount;
        }

        if ( !empty(GraduationRequirements::where('courseCode', '=', $courseCode)->where('unitType', '=', 'Co-Major')->first()) )
            $co_major = GraduationRequirements::where('courseCode', '=', $courseCode)->where('unitType', '=', 'Co-Major')->first()->unitCount;
        else {
            $type_co_major = new GraduationRequirements;
            $type_co_major->courseCode = $courseCode;
            $type_co_major->unitType = 'Co-Major';
            $type_co_major->unitCount = 0;
            $type_co_major->created_at = Carbon::now();
            $type_co_major->save();

            $co_major = $type_co_major->unitCount;
        }

        // send data to view
        $data['core'] = $core;
        $data['elective'] = $elective;
        $data['major'] = $major;
        $data['minor'] = $minor;
        $data['co_major'] = $co_major;
        $data['user'] = $user;

        return view('coordinator.graduationrequirements', $data);
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
            'core',
            'elective',
            'major',
            'minor',
            'co_major',
            'user'
        ]);

        // Get the coordinator's username and courseCode
        $user = Auth::user();
        $courseCode = CourseCoordinator::where('username', '=', $input['user'])->first()->courseCode;
        $data['user'] = $user;

        // update status
        $data['status'] = true;

        // update the count
        // core
        $core_requirement = GraduationRequirements::where('courseCode', '=', $courseCode)
        ->where('unitType', '=', 'Core')
        ->update([ 'unitCount' => $input['core'] ]);

        // elective
        $elective_requirement = GraduationRequirements::where('courseCode', '=', $courseCode)
        ->where('unitType', '=', 'Elective')
        ->update([ 'unitCount' => $input['elective'] ]);

        // major
        $major_requirement = GraduationRequirements::where('courseCode', '=', $courseCode)
        ->where('unitType', '=', 'Major')
        ->update([ 'unitCount' => $input['major'] ]);

        // minor
        $minor_requirement = GraduationRequirements::where('courseCode', '=', $courseCode)
        ->where('unitType', '=', 'Minor')
        ->update([ 'unitCount' => $input['minor'] ]);

        // co_major
        $co_major_requirement = GraduationRequirements::where('courseCode', '=', $courseCode)
        ->where('unitType', '=', 'Co-major')
        ->update([ 'unitCount' => $input['co_major'] ]);

        // set variables to use in view
        $data['core'] = GraduationRequirements::where('courseCode', '=', $courseCode)
        ->where('unitType', '=', 'Core')->first()->unitCount;

        $data['elective'] = GraduationRequirements::where('courseCode', '=', $courseCode)
        ->where('unitType', '=', 'Elective')->first()->unitCount;

        $data['major'] = GraduationRequirements::where('courseCode', '=', $courseCode)
        ->where('unitType', '=', 'Major')->first()->unitCount;

        $data['minor'] = GraduationRequirements::where('courseCode', '=', $courseCode)
        ->where('unitType', '=', 'Minor')->first()->unitCount;

        $data['co_major'] = GraduationRequirements::where('courseCode', '=', $courseCode)
        ->where('unitType', '=', 'Co-Major')->first()->unitCount;

        // update with view containing status
        return view('coordinator.graduationrequirements', $data);
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
