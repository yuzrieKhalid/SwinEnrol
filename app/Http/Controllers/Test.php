<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Unit;
use App\Requisite;

class Test extends Controller
{
    public function test()
    {
        return response()->json($this->showRequisites());
        return response()->json($this->manageUnit());
    }

    public function manageUnit()
    {
        $data = [];

        $unit = Unit::findOrFail('PRG0');

        $PRE10 = json_decode('[[{"unitCode":"PRE10","requisite":"COMP","type":["prerequisite"],"index":0,"created_at":"2016-10-17 18:57:59","updated_at":"2016-10-17 18:57:59"},{"unitCode":"PRE10","requisite":"GEN1","type":["prerequisite"],"index":0,"created_at":"2016-10-17 18:57:59","updated_at":"2016-10-17 18:57:59"}],[{"unitCode":"PRE10","requisite":"COMPB","type":["prerequisite"],"index":1,"created_at":"2016-10-17 18:57:59","updated_at":"2016-10-17 18:57:59"},{"unitCode":"PRE10","requisite":"COMPC","type":["prerequisite"],"index":1,"created_at":"2016-10-17 18:57:59","updated_at":"2016-10-17 18:57:59"}]]');
        $PRG0 = json_decode('[[{"unitCode":"PRG0","requisite":"COMPA","type":["prerequisite","2"],"index":0,"created_at":"2016-10-17 18:57:59","updated_at":"2016-10-17 18:57:59"},{"unitCode":"PRG0","requisite":"COMPB","type":["prerequisite","2"],"index":0,"created_at":"2016-10-17 18:57:59","updated_at":"2016-10-17 18:57:59"},{"unitCode":"PRG0","requisite":"GEN1","type":["prerequisite","2"],"index":0,"created_at":"2016-10-17 18:57:59","updated_at":"2016-10-17 18:57:59"}]]');

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

        // drop old requisites
        Requisite::where('unitCode', '=', $unit->unitCode)->delete();

        // create and store prerequisites
        if(count($PRG0) > 0)
        {
            $index = 0; // index for prerequisites
            // loop through prerequisite group
            foreach($PRG0 as $prerequisiteGroup)
            {
                // loop through prerequisites in group
                foreach($prerequisiteGroup as $prerequisite)
                {
                    // create new prerequisite
                    $requisite = new Requisite;
                    $requisite->unitCode = $unit->unitCode;
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

        return $PRG0;
    }

    public function showRequisites()
    {
        $data = [];

        $unit = Unit::findOrFail('PRG0');

        $prerequisiteJSON = json_decode('[[{"unitCode":"PRE10","requisite":"COMP","type":["prerequisite"],"index":0,"created_at":"2016-10-17 18:57:59","updated_at":"2016-10-17 18:57:59"},{"unitCode":"PRE10","requisite":"GEN1","type":["prerequisite"],"index":0,"created_at":"2016-10-17 18:57:59","updated_at":"2016-10-17 18:57:59"}],[{"unitCode":"PRE10","requisite":"COMPB","type":["prerequisite"],"index":1,"created_at":"2016-10-17 18:57:59","updated_at":"2016-10-17 18:57:59"},{"unitCode":"PRE10","requisite":"COMPC","type":["prerequisite"],"index":1,"created_at":"2016-10-17 18:57:59","updated_at":"2016-10-17 18:57:59"}]]');
        $PRG0 = json_decode('[[{"unitCode":"PRG0","requisite":"COMPA","type":["prerequisite","2"],"index":0,"created_at":"2016-10-17 18:57:59","updated_at":"2016-10-17 18:57:59"},{"unitCode":"PRG0","requisite":"COMPB","type":["prerequisite","2"],"index":0,"created_at":"2016-10-17 18:57:59","updated_at":"2016-10-17 18:57:59"},{"unitCode":"PRG0","requisite":"GEN1","type":["prerequisite","2"],"index":0,"created_at":"2016-10-17 18:57:59","updated_at":"2016-10-17 18:57:59"}]]');

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

        return $data['prerequisites'];
    }
}
