<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Unit;
use DB;

class ViewPlannerController extends Controller
{
    public function index() {
        // $student = Student::findOrFail($stdID);  // this may need extra parameter

        // commented out on 23/05/22016
        // $unitlisting = DB::table('unit_listing')
        //     ->join('unit', 'unit.unitCode', '=', 'unit_listing.unitCode')
        //     ->select('unit_listing.*', 'unit.unitName', 'unit.prerequisite')
        //     ->get();         // this need to filter based on student's course
        //
        // $data = [];
        // $data['units'] = $unitlisting;

        // for now need at least something to pass to the $data to make the page work
        $unitlisting = Unit::all();
        $data['units'] = $unitlisting;

        return view ('student.viewstudyplanner', $data);
        // return view ('student.viewstudyplanner');
    }
}
