<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use Auth;
use App\Course;
use App\Student;
use App\EnrolmentIssues;
use App\StudentEnrolmentIssues;

class EnrolmentIssuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];

        $user = Auth::user();

        // get User Student
        $student = Student::where('studentID', '=', $user->username)->first();
        $studentcourse = Course::where('courseCode', '=', $student->courseCode)->get();

        $data['student'] = $student;
        $data['studentcourse'] = $studentcourse;

        // get all courses apart from the one currently being taken
        $courses = Course::where('courseCode', '!=', $student->courseCode)->get();
        $data['courses'] = $courses;

        // get previous, current and next year
        $currentyear = Carbon::now()->year;
        $nextyear = Carbon::now()->addYears(1)->year;
        $next2year = Carbon::now()->addYears(2)->year;
        $data['currentyear'] = $currentyear;
        $data['nextyear'] = $nextyear;
        $data['next2year'] = $next2year;

        return view ('student.enrolmentissues', $data);
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
        // $input = $request->only([
        //
        // ]);
        //
        // $issue = new StudentEnrolmentIssues;
        //
        // return response()->json($)
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
    public function destroy($id)
    {
        //
    }
}
