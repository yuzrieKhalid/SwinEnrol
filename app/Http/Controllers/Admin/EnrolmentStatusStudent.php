<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Student;
use App\Course;
use App\Units;
use App\EnrolmentUnits;
use DB;
use Config;
use View;

class EnrolmentStatusStudent extends Controller
{

    public function index() {

      $data = [];
      //$student = Student::all();

      //$student = Student::make("studentID")->with("student", $student);
      //$data['student'] = $student;

      $studentID = Student::all();
      $data['studentID']= $studentID;
      // $enrolled = EnrolmentUnits:all();
      // $data['enrolled']= $enrolled;

    //  $enrolled = EnrolmentUnits::all();

      return view('admin.enrolmentstatus', $data);

      //return View::make('admin.enrolmentstatus', compact('student'));


      //return view ('admin.enrolmentstatus',$data);


    }
    public function create(){
      // $data = [];
      //
      // //$enrolled = EnrolmentUnits::with('student','enrolment_units')->get();
      // $enrolled = EnrolmentUnits::with('student','unit')->where('studentID')->get();
      //
      // $data['enrolled'] = $enrolled;
      // return view ('admin.enrolmentstatus',$data);

    }

    public function store(Request $request)
    {
      // $data = [];
      //
      //
      // $student = Student::where('studentID', '=', true)->get();
      // $data['student'] = $student;
      //
      // $enrolled = EnrolmentUnits::with('unit')->where('studentID', '=', $user->username)->get();
      // $data['enrolled'] = $enrolled;
      //
      // $units = Unit::all();
      // $data['units'] = $units;
      //
      // return response()->json($data);
    }
}
