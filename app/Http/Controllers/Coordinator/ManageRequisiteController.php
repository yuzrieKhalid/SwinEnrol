<?php

namespace App\Http\Controllers\Coordinator;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Requisite;
use App\Unit;

class ManageRequisiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->json('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json('store');
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

        return view ('coordinator.managerequisites', $data);
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
            'prerequisite',
            'corequisite',
            'antirequisite',
            'minimumUnits'
        ]);

        // drop old requisites
        Requisite::where('unitCode', '=', $id)->delete();

        // create and store prerequisites
        if(count($input['prerequisite']) > 0)
        {
            $index = 0; // index for prerequisites
            foreach($input['prerequisite'] as $prerequisiteGroup)
            {
                // loop through prerequisites in group
                foreach($prerequisiteGroup as $prerequisite)
                {
                    // create new prerequisite
                    $requisite = new Requisite;
                    $requisite->unitCode = $input['unitCode'];
                    $requisite->requisite = $prerequisite;
                    $type = 'prerequisite';
                    // join prerequisite type with unit count if exists
                    if($input['minimumUnits'][$index] > 1)
                        $type = $type.' '.$input['minimumUnits'][$index];
                    $requisite->type = $type;
                    $requisite->index = $index;
                    $requisite->save();
                }
                $index++;
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

        return response()->json($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json('delete'.$id);
    }
}
