<?php

namespace App\Http\Controllers\Super;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\UnitType;
use Auth;

class ManageUnitType extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];

        $data['types'] = UnitType::all(); // get all unit types

        return view('super.manageunittype', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];

        $data['types'] = UnitType::all();

        return view('super.manageunittype_create', $data);
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
            'unitType'
        ]);

        // create and store new unit type
        $type = new unitType;
        $type->unitType = $input['unitType'];
        $type->save();

        return redirect('super/manageunittype');
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
        // get unit type
        $data['type'] = UnitType::findOrFail($id);

        return view('super.manageunittype_create', $data);
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
            'unitType'
        ]);

        // get and update unit type
        $type = UnitType::findOrFail($id);
        $type->unitType = $input['unitType'];
        $type->save();

        return redirect('super/manageunittype');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // find and delete unit type
        $type = UnitType::findOrFail($id);
        $type->delete();

        return redirect('super/manageunittype');
    }
}
