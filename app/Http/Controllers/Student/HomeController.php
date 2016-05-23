<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\Student;
use App\Unit;
use App\EnrolmentUnits;
use DB;

class HomeController extends Controller
{
    public function index() {
        $data = [];

        $user = Auth::user();

        $student = Student::where('studentID', '=', '$user->username')->get();
        $data['student'] = $student;
        // $student = DB::table('student')
        //     ->select('student.*')
        //     ->where('student.studentID', '=', '4304373')
        //     ->get(); // temporary
        // $data['students'] = $student;

        //  list out all units available  --> !for now, list all!
        // TODO: only list down available units
        // $units = Unit::all();
        // $data['units'] = $units;

        // $enrolled = EnrolmentUnits::all();
        $enrolled = EnrolmentUnits::with('unit')->where('studentID', '=', $user->username)->get();
        $data['enrolled'] = $enrolled;

        // get units for student
        // $units = DB::table('enrolment_units')
        //     ->join('unit', 'unit.unitCode', '=', 'enrolment_units.unitCode')
        //     ->select('enrolment_units.*', 'unit.unitName')
        //     ->where('studentID', '=', '$user->username') // need to check for current term too
        //     ->get();

        return view ('student.student', $data);
    }
}
