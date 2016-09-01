<?php

namespace App\Http\Controllers\Coordinator;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\UnitListing;
use App\UnitTerm;
use App\Unit;
use App\Config;
use DB;

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
        return response()->json(UnitListing::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semester = Config::where('id', '=', 'semester')->get();
        $data = [];
        $units = UnitTerm::with('unit', 'unit_type')
            ->where('unitType', '=', 'unit_listing')
            ->where('year', '=', Carbon::now()->year)
            ->where('term', '=', $semester[0]->value)
            ->where('enrolmentTerm', '=', 'long')
            ->get();
        $data['termUnits'] = $units;

        $units = UnitTerm::with('unit', 'unit_type')
            ->where('unitType', '=', 'unit_listing')
            ->where('year', '=', Carbon::now()->year)
            ->where('term', '=', $semester[0]->value)
            ->where('enrolmentTerm', '=', 'short')
            ->get();
        $data['termUnitsShort'] = $units;

        $units = Unit::all();
        $data['units'] = $units;

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
            'enrolmentTerm'
        ]);

        $semester = Config::where('id', '=', 'semester')->get();

        $unit = new UnitTerm;
        $unit->unitType = 'unit_listing';
        $unit->unitCode = $input['unitCode'];
        $unit->year = Carbon::now()->year;
        $unit->term = $semester[0]->value;
        $unit->enrolmentTerm = $input['enrolmentTerm'];
        $unit->courseCode = 'I047'; // todo: get from coordinator

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
        $input = $request->only([
            'unitCode',
            'enrolmentTerm'
        ]);

        // not working (because it's not necessary)
        $unitlisting = UnitTerm::findOrFail($id);
        $unitlisting->unitCode = $input['unitCode'];

        $unitlisting->save();
        return response()->json($unitlisting);
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
            'enrolmentTerm'
        ]);

        $semester = Config::where('id', '=', 'semester')->get();

        $unitlisting = UnitTerm::where('unitCode', '=', $input['unitCode'])
            ->where('year', '=', Carbon::now()->year)
            ->where('term', '=', $semester[0]->value)
            ->where('enrolmentTerm', '=', $input['enrolmentTerm'])
            ->delete();

        return response()->json($unitlisting);
    }
}
