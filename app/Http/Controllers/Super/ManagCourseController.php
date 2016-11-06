<?php

namespace App\Http\Controllers\Super;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Unit;
use App\Course;


class ManagCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(Course::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $data = [];
          $courses = Course::all();

          $data['courses'] = $courses;
          return view ('super.managecourse', $data);
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
          'courseCode',
          'courseName',
          'semestersPerYear',
          'semesterCount',
          'studyLevel'

      ]);

      $course = new Course;
      $course->courseCode = $input['courseCode'];
      $course->courseName = $input['courseName'];
      $course->semestersPerYear = $input['semestersPerYear'];
      $course->semesterCount = $input['semesterCount'];
      $course->studyLevel = $input['studyLevel'];
      $course->save();

      return response()->json($course);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $data = [];
      $course = Course::findOrFail($id);
      //$course = Course::all();
      $data['courses'] = $course;
      return view ('super.managecourse_edit', $data);

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
      $input = $request->only([
          'courseCode',
          'courseName',
          'semestersPerYear',
          'semesterCount',
          'studyLevel'
      ]);

      $course = Course::findOrFail($id);
      $course->courseCode = $input['courseCode'];
      $course->courseName = $input['courseName'];
      $course->semestersPerYear = $input['semestersPerYear'];
      $course->semesterCount = $input['semesterCount'];
      $course->studyLevel = $input['studyLevel'];
      $course->save();

      return response()->json($course);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $course = Course::findOrFail($id);
      $course->delete();

      return response()->json($course);
    }
}
