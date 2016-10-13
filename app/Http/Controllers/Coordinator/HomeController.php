<?php

namespace App\Http\Controllers\Coordinator;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\Config;
use App\StudyPlanner;
use App\Unit;
use App\Student;
use App\Course;
use App\CourseCoordinator;
use App\CoordinatorUnits;

class HomeController extends Controller
{
    // refer to data() for the table population
    public function index() {
        $data = [];

        $semester = Config::find('semester')->value;
        $data['semester'] = $semester;

        $year = Config::find('year')->value;
        $data['year'] = $year;

        // get coordinator's course from the username
        // get coordinator's course from the course_coordinator table
        $course_coordinator = CourseCoordinator::with('course')
            ->where('username', '=', Auth::user()->username)->first();
        $courseCode = $course_coordinator->courseCode;
        $courseName = $course_coordinator->course->courseName;
        $data['courseCode'] = $courseCode;
        $data['courseName'] = $courseName;

        // get units from study planner
        $planner_units = StudyPlanner::with('unit')->where('courseCode', '=', $courseCode)->get();
        $data['planner_units'] = $planner_units;

        // count student
        $student_count = Student::where('courseCode', '=', Auth::user()->username)->count();
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
        // currently cannot get only for the specific course from the unit listing
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

        $student_count = Student::where('courseCode', '=', Auth::user()->username)->count();
        $data['student_count'] = $student_count;

        // data inside information will be retrieved from JS

        // return view ('coordinator.coordinator', $data);
        return response()->json($data);
    }
}
