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

      // $data = [];
      //

      // $enrolled = EnrolmentUnits::with('student','unit')->get();
      // $data['enrolled'] = $enrolled;
      // return view('admin.enrolmentstatus', $data);
      $data = [];
      $studentID = Student::all();
      $data['studentID']= $studentID;
      $enrolled = EnrolmentUnits::with('student')->where('status','=', 'pending')->get();
      $data['enrolled'] = $enrolled;

      //return response()->json($data);
      return view('admin.enrolmentstatus', $data);


    }

     public function index2()
      {
        // $input = $request->only([
        //     'studentID'
        // ]);
        // $data2 = [];
        // $studentID = Student::all();
        // $data2['studentID']= $studentID;
        //
        // $enrolled2 = EnrolmentUnits::with('student','enrolment_units')
        // ->where('studentID','=',$input['studentID'])->first();
        // $data2['enrolled'] = $enrolled2;

      }
      public function create()
      {
        //$data = [];
        // $studentID = Student::all();
        // $data['studentID']= $studentID;
        // $enrolled = EnrolmentUnits::all();
        // $data['enrolled'] = $enrolled;

        //return response()->json($data);
        //return view('admin.enrolmentstatus', $data);
      }

      /**
       * Store a newly created resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return \Illuminate\Http\Response
       */
      public function store(Request $request)
      {
          //
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
      public function update(Request $request, $studentID, $issueID)
      {
        //
      }

      /**
       * Remove the specified resource from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function destroy($studentID, $issueID)
      {
          //
      }


}
