<?php

namespace App\Http\Controllers\AdminOfficer;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Config;
use App\Unit;
use App\UnitInfo;
use DB;

class ManageUnitInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // get search query
        $input = $request->only(['search']);

        $data = [];

        // check if search query exists
        if($input['search'] != '')
        {
            // search query
            $data['units'] = Unit::where('unitCode', 'LIKE', '%'.$input['search'].'%')->get();
            $data['search'] = $input['search'];
        }
        else
        {
            $data['units'] = Unit::get(); // get all units
        }

        return view('adminofficer.manageunitinfo', $data);
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
        //
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
    public function edit(Request $request, $id)
    {
        // get request information
        $input = $request->only([
            'year',
            'semester'
        ]);

        // get user input
        if($input['year'] == '')
            $data['selectedYear'] = Config::find('year')->value;
        else
            $data['selectedYear'] = $input['year'];

        if($input['semester'] == '')
            $data['semester'] = Config::find('semester')->value;
        else
            $data['semester'] = $input['semester'];

        // get config information
        $data['year'] = Config::find('year')->value;

        // get unit information
        $data['unit'] = Unit::where('unitCode', '=', $id)->first();
        $data['unitInfo'] = UnitInfo::where([
            'unitCode' => $id,
            'year' => $data['selectedYear'],
            'semester' => $data['semester']
        ])->first();

        // parse json array for lecturers
        if(isset($data['unitInfo']['lecturers']))
            $data['unitInfo']['lecturers'] = json_decode($data['unitInfo']['lecturers']);

        // parse json array for tutors
        if(isset($data['unitInfo']['tutors']))
            $data['unitInfo']['tutors'] = json_decode($data['unitInfo']['tutors']);

        return view('adminofficer.manageunitinfo_edit', $data);
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
        // get data from request
        $input = $request->only([
            'unitCode',
            'year',
            'semester',
            'convenor',
            'maxStudentCount',
            'lectureDuration',
            'lectureGroupCount',
            'tutorialDuration',
            'tutorialGroupCount',
            'lecturers',
            'tutors',
            'importYear',
            'importSemester'
        ]);

        // check if importing from another semester
        if($input['importYear'] != '')
        {
            // get unit information from selected semester
            $importUnit = UnitInfo::where([
                'unitCode' => $input['unitCode'],
                'year' => $input['importYear'],
                'semester' => $input['importSemester']
            ])->first();

            // set values to be imported to current semester
            $input['convenor'] = $importUnit['convenor'];
            $input['maxStudentCount'] = $importUnit['maxStudentCount'];
            $input['lectureDuration'] = $importUnit['lectureDuration'];
            $input['lectureGroupCount'] = $importUnit['lectureGroupCount'];
            $input['tutorialDuration'] = $importUnit['tutorialDuration'];
            $input['tutorialGroupCount'] = $importUnit['tutorialGroupCount'];
            $input['lecturers'] = $importUnit['lecturers'];
            $input['tutors'] = $importUnit['tutors'];
        }

        // delete existing information
        UnitInfo::where([
            'unitCode' => $input['unitCode'],
            'year' => $input['year'],
            'semester' => $input['semester']
        ])->delete();

        // add new unit information
        DB::table('unit_info')->insert([
            'unitCode' => $input['unitCode'],
            'year' => $input['year'],
            'semester' => $input['semester'],
            'convenor' => $input['convenor'],
            'maxStudentCount' => $input['maxStudentCount'],
            'lectureDuration' => $input['lectureDuration'],
            'lectureGroupCount' => $input['lectureGroupCount'],
            'tutorialDuration' => $input['tutorialDuration'],
            'tutorialGroupCount' => $input['tutorialGroupCount'],
            'lecturers' => $input['lecturers'],
            'tutors' => $input['tutors']
        ]);

        return response()->json('ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // get data from request
        $input = $request->only([
            'year',
            'semester'
        ]);

        // delete existing information
        UnitInfo::where([
            'unitCode' => $id,
            'year' => $input['year'],
            'semester' => $input['semester']
        ])->delete();

        return response()->json('ok');
    }
}
