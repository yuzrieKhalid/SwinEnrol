<?php

namespace App\Http\Controllers\Coordinator;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\UnitListing;
use App\Unit;
use App\Config;

use Carbon\Carbon;

class ManageListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get config information
        $semester = Config::find('semester')->value;
        $year = Config::find('year')->value;

        $unitterm = UnitListing::with('unit')
            ->where('year', '=', $year)
            ->where('semester', '=', $semester)
            ->where('semesterLength', '=', 'long')
            ->get();

        return response()->json($unitterm);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];

        $semester = Config::find('semester')->value;
        $year = Config::find('year')->value;

        // because the config contains the value for current semester so we need to change it accordingly
        // because a unit listing shows the list for next semester
        if (Config::find('semester')->value == 'Semester 1') {
            $semester = 'Semester 2';
        } else {
            // if semester 2 in 2016
            $year += 1; // +1 year
            $semester = 'Semester 1';
        }
        $data['year'] = $year;
        $data['semester'] = $semester;

        // get long semester units
        $data['semesterUnits'] = UnitListing::with('unit')
            ->where('year', '=', $year)
            ->where('semester', '=', $semester)
            ->where('semesterLength', '=', 'long')
            ->get();

        // get short semester units
        $data['semesterUnitsShort'] = UnitListing::with('unit')
            ->where('year', '=', $year)
            ->where('semester', '=', $semester)
            ->where('semesterLength', '=', 'short')
            ->get();

        // get all units
        $data['units'] = Unit::all();

        return view ('coordinator.manageunitlisting', $data);
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
            'semesterLength'
        ]);

        $semester = Config::find('semester')->value;
        $year = Config::find('year')->value;

        // because the config contains the value for current semester so we need to change it accordingly
        // because a unit listing shows the list for next semester
        if (Config::find('semester')->value == 'Semester 1') {
            $semester = 'Semester 2';
        } else {
            // if semester 2 in 2016
            $year += 1; // +1 year
            $semester = 'Semester 1';
        }

        // create and store new unit
        $unit = new UnitListing;
        $unit->unitCode = $input['unitCode'];
        $unit->year = $year;
        $unit->semester = $semester;
        $unit->semesterLength = $input['semesterLength'];

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
        return view ('coordinator.manageunitlisting', ['coordinator.manageunitlisting' => UnitListing::findOrFail($id)]);
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
    public function destroy(Request $request, $id)
    {
        $input = $request->only([
            'unitCode',
            'semesterLength'
        ]);

        // get config information
        $semester = Config::find('semester')->value;
        $year = Config::find('year')->value;

        // because the config contains the value for current semester so we need to change it accordingly
        // because a unit listing shows the list for next semester
        if (Config::find('semester')->value == 'Semester 1') {
            $semester = 'Semester 2';
        } else {
            // if semester 2 in 2016
            $year += 1; // +1 year
            $semester = 'Semester 1';
        }

        // delete unit listing entry
        $unitlisting = UnitListing::where('unitCode', '=', $input['unitCode'])->delete()
        ->where('year', '=', $year)
        ->where('semester', '=', $semester)
        ->where('semesterLength', '=', $input['semesterLength'])
        ->delete();

        return response()->json($unitlisting);
    }
}
