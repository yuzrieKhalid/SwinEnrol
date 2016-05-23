<?php

namespace App\Http\Controllers\Coordinator;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\UnitListing;
use App\UnitTerm;
use DB;

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
        $data = [];
        $units = UnitTerm::with('unit', 'unit_type')
            ->where('unitType', '=', 'Study Planner')
            ->get();
        // $units = DB::table('unit_listing')
        //     ->join('unit', 'unit_listing.unitCode', '=', 'unit.unitCode')
        //     ->select('unit_listing.*', 'unit.unitName')
        //     ->get();
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
            'year',
            'term',
            'unitCode'
        ]);

        $unitlisting = new UnitListing;
        $unitlisting->year = $input['year'];
        $unitlisting->term = $input['term'];
        $unitlisting->unitCode = $input['unitCode'];

        $unitlisting->save();
        return response()->json($unitlisting);
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
            'year',
            'term',
            'unitCode'
        ]);

        $unitlisting = UnitListing::findOrFail($id);
        $unitlisting->year = $input['year'];
        $unitlisting->term = $input['term'];
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
    public function destroy($id)
    {
        $unitlisting = UnitListing::findOrFail($id);
        $unitlisting->delete();

        return response()->json($unitlisting);
    }
}
