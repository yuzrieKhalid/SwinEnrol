<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Student;
use App\Course;
use App\Units;
use App\EnrolmentUnits;

class EnrolmentStatusStudent extends Controller
{

    public function index() {

      // return view ('admin.enrolmentstatus',$data);
      //$enrolledList = EnrolmentUnits::with('unit', 'student')->where('status', '=', '')
      //
      // return response()->json(EnrolmentUnits::with('student','unit')
      // ->where('studentID','=', '4315405')
      // ->get();
    }
    public function create(){
      // $data = [];
      //
      // //$enrolled = EnrolmentUnits::with('student','enrolment_units')->get();
      // $enrolledUnit = EnrolmentUnits::with('student','unit')->where('unitCode','=', $student->unitCode)->get();
      // $data['enrolled'] = $enrolledUnit;
      return view ('admin.enrolmentstatus');

    }
}
