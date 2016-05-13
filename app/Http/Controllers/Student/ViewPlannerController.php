<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Student;
use App\StudyPlanner;
use DB;

class ViewPlannerController extends Controller
{
    public function index() {
        // $student = Student::findOrFail($stdID);  // this may need extra parameter
        $unitlisting = DB::table('unit_listing')
            ->join('unit', 'unit.unitCode', '=', 'unit_listing.unitCode')
            ->select('unit_listing.*', 'unit.unitName', 'unit.prerequisite')
            ->get();         // this need to filter based on student's course

        $data = [];
        $data['units'] = $unitlisting;
        return view ('student.viewstudyplanner', $data);
    }
}
