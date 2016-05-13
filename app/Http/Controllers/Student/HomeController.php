<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Student;
use App\Unit;
use DB;

class HomeController extends Controller
{
    public function index() {
        $data = [];

        // get student id
        $student = DB::table('student')
            ->select('student.*')
            ->where('student.studentID', '=', '4304373')
            ->get(); // temporary
        $data['students'] = $student;

        // get units for student
        $units = DB::table('enrolment_units')
            ->join('unit', 'unit.unitCode', '=', 'enrolment_units.unitCode')
            ->select('enrolment_units.*', 'unit.unitName')
            // ->where('studentID', '=', $studentID) // need to check for current term too
            ->get();
        $data['units'] = $units;

        return view ('student.student', $data);
    }
}
