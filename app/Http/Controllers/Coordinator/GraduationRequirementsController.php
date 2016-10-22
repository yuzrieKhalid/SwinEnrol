<?php

namespace App\Http\Controllers\Coordinator;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Carbon\Carbon;
use App\GraduationRequirements;
use App\CourseCoordinator;
use App\UnitType;

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
        $data['courseCode'] = $courseCode;

        $gradreqs = GraduationRequirements::where('courseCode', '=', $courseCode)->get();
        $data['gradreqs'] = $gradreqs;

        $availablereqs = [];
        $allreqs = UnitType::all();

        foreach ($allreqs as $arequirement) {
            if (!Self::checkifExist($arequirement, $gradreqs))
                $availablereqs[] = $arequirement->unitType;
        }
        // test
        // return response()->json(Self::checkifExist('Minor', $gradreqs));

        $data['availablereqs'] = $availablereqs;

        return view('coordinator.graduationrequirements', $data);
        // return response()->json($data);
    }

    // return boolean value
    function checkifExist($requirement, $fromExistingObjects)
    {
        foreach ($fromExistingObjects as $existingRequirement) {
            if ($requirement->unitType == $existingRequirement->unitType)
                return true;
        }
        return false;
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
            'unitType',
            'unitCount'
        ]);

        // Get the coordinator's username and courseCode
        $user = Auth::user();
        $courseCode = CourseCoordinator::where('username', '=', $user->username)->first()->courseCode;

        $gradreqs = GraduationRequirements::where('courseCode', '=', $courseCode)->get();
        $data['gradreqs'] = $gradreqs;

        $availablereqs = UnitType::all();
        $data['availablereqs'] = $availablereqs;

        // save the new info
        $newrequirement = new GraduationRequirements;
        $newrequirement->courseCode = $courseCode;
        $newrequirement->unitType = $input['unitType'];
        $newrequirement->unitCount = $input['unitCount'];
        $newrequirement->save();

        // update status
        $data['status'] = true;

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
        $input = $request->only([
            'unitType',
            'unitCount'
        ]);

        // Get the coordinator's username and courseCode
        $user = Auth::user();
        $courseCode = CourseCoordinator::where('username', '=', $user->username)->first()->courseCode;

        $requirement = GraduationRequirements::where('courseCode', '=', $courseCode)
        ->where('unitType', '=', $input['unitType'])
        ->update(['unitCount' => $input['unitCount']]);

        return response()->json($requirement);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get the coordinator's username and courseCode
        $user = Auth::user();
        $courseCode = CourseCoordinator::where('username', '=', $user->username)->first()->courseCode;

        $type = GraduationRequirements::where('courseCode', '=', $courseCode)
        ->where('unitType', '=', $id)
        ->delete();

        $gradreq = GraduationRequirements::where('courseCode', '=', $courseCode)->get();


        return response()->json($gradreq);
    }
}
