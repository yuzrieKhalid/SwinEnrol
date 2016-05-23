<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Unit;
use DB;

class ViewListingController extends Controller
{
    public function index() {
        // $student = Student::findOrFail($stdID);  // this may need extra parameter

        // commented out on 23/05/22016
        // $unitlisting = DB::table('unit_listing')
        //     ->join('unit', 'unit_listing.unitCode', '=', 'unit.unitCode')
        //     ->select('unit_listing.*', 'unit.unitName')
        //     ->get();          // this need to filter based on student's course
        //
        // $data = [];

        // for now need at least something to pass to the $data to make the page work
        $unitlisting = Unit::all();
        $data['units'] = $unitlisting;

        return view ('student.viewunitlistings', $data);
        // return view ('student.viewunitlistings');
    }
}
