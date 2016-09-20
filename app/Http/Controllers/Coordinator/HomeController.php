<?php

namespace App\Http\Controllers\Coordinator;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Config;
use App\UnitTerm;
use App\Unit;
use App\Student;

class HomeController extends Controller
{
    // refer to data() for the table population
    public function index() {
        $data = [];

        $semester = Config::find('semester')->value;
        $data['semester'] = $semester;

        $year = Config::find('year')->value;
        $data['year'] = $year;

        // TODO: currently don't have a way to check coordinator's courseCode
        $course = UnitTerm::where('courseCode', '=', 'I047')->get();
        $data['course'] = $course;

        // incomplete: how to check for coordinator's coursecode, for now, hardcode 'I047'
        $student_count = Student::where('courseCode', '=', 'I047')->count();
        $data['student_count'] = $student_count;

        // data inside information will be retrieved from JS

        return view ('coordinator.coordinator', $data);
        // return response()->json($termUnits);
    }

    public function data() {
        $data = [];

        $semester = Config::find('semester')->value;
        $year = Config::find('year')->value;

        // to display unit listing based on long/short semester
        $termUnits = [];
        if ($semester == 'Semester 1' || $semester == 'Semester 2') {
            // for long semester
            $termUnits = UnitTerm::with('unit')
            ->where('unitType', '=', 'unit_listing')
            ->where('year', '=', $year)
            ->where('term', '=', $semester)
            ->where('enrolmentTerm', '=', 'long')
            ->get();
        } else {
            // for short semester
            $termUnits = UnitTerm::with('unit', 'unit_type')
            ->where('unitType', '=', 'unit_listing')
            ->where('year', '=', $year)
            ->where('term', '=', $semester)
            ->where('enrolmentTerm', '=', 'short')
            ->get();
        }
        $data['termUnits'] = $termUnits;

        // incomplete: how to check for coordinator's coursecode, for now, hardcode 'I047'
        $student_count = Student::where('courseCode', '=', 'I047')->count();
        $data['student_count'] = $student_count;

        // data inside information will be retrieved from JS

        // return view ('coordinator.coordinator', $data);
        return response()->json($data);
    }
}
