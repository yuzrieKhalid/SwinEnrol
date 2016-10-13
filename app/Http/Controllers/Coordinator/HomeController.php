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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

        // get units from coordinator_units
        $coordinator_units = CoordinatorUnits::with('unit')->where('username', '=', Auth::user()->username)->get();
        $data['coordinator_units'] = $coordinator_units;

        // count student
        $student_count = Student::where('courseCode', '=', $courseCode)->count();
        $data['student_count'] = $student_count;

        // data inside information will be retrieved from JS

        return view ('coordinator.coordinator', $data);
        // return response()->json($termUnits);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->only([
            'username',
            'unitCode'
        ]);

        $coordinator_unit = new CoordinatorUnits;
        $coordinator_unit->username = Auth::user()->username;
        $coordinator_unit->unitCode = $input['unitCode'];
        $coordinator_unit->save();

        return response()->json($coordinator_unit);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($unitCode)
    {
        $coordinator_units = CoordinatorUnits::where('unitCode', '=', $unitCode);
        $coordinator_units->delete();

        return response()->json($unitCode);
    }
}
