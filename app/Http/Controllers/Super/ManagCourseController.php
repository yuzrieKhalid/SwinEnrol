<?php

namespace App\Http\Controllers\Super;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Course;
use App\StudyLevel;
use App\Unit;


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

          $data['courses'] = Course::all(); // get course information
          $data['studyLevel'] = StudyLevel::all(); // get study levels

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

      // create and store new course
      if (!Course::find($input['courseCode'])) {
          $course = new Course;
          $course->courseCode = $input['courseCode'];
          $course->courseName = $input['courseName'];
          $course->semestersPerYear = $input['semestersPerYear'];
          $course->semesterCount = $input['semesterCount'];
          $course->studyLevel = $input['studyLevel'];
          $course->save();
      } else {
          return redirect('errors.recordexist');
      }

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

      $data['courses'] = Course::findOrFail($id); // get course information
      $data['studyLevel'] = StudyLevel::all(); // get all study levels

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

      // find and update course
      $course = Course::findOrFail($id);
      $course->courseCode = $input['courseCode'];
      $course->courseName = $input['courseName'];
      $course->semestersPerYear = $input['semestersPerYear'];
      $course->semesterCount = $input['semesterCount'];
      $course->studyLevel = $input['studyLevel'];
      $course->save();

      return redirect()->action('Super\ManagCourseController@create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete course
        $course = Course::findOrFail($id);
        $course->delete();

        return response()->json($course);
    }
}
