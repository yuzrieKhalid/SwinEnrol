<?php

namespace App\Http\Controllers\Coordinator;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Config;
use App\UnitListing;
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

        // TODO: filter through coordinator's course
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
        $semesterUnits = [];
        if ($semester == 'Semester 1' || $semester == 'Semester 2') {
            // for long semester
            $semesterUnits = UnitListing::with('unit')
            ->where('year', '=', $year)
            ->where('semester', '=', $semester)
            ->where('semesterLength', '=', 'long')
            ->get();
        } else {
            // for short semester
            $semesterUnits = UnitListing::with('unit')
            ->where('year', '=', $year)
            ->where('semester', '=', $semester)
            ->where('semesterLength', '=', 'short')
            ->get();
        }
        $data['semesterUnits'] = $semesterUnits;

        // incomplete: how to check for coordinator's coursecode, for now, hardcode 'I047'
        $student_count = Student::where('courseCode', '=', 'I047')->count();
        $data['student_count'] = $student_count;

        // data inside information will be retrieved from JS

        // return view ('coordinator.coordinator', $data);
        return response()->json($data);
    }
}
