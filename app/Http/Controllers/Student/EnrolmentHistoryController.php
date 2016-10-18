<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\EnrolmentUnits;
use App\Student;
use Auth;
use Excel;
use DB;

class EnrolmentHistoryController extends Controller
{
    public function index()
    {
        $data = [];

        // get the logged in student details
        $user = Auth::user();
        $student = Student::where('studentID', '=', $user->username)->get();
        $data['student'] = $student;

        // get all the previous taken units (joined with Unit table)
        $enrolled = EnrolmentUnits::with('unit')->where('studentID', '=', $user->username)->get();
        $data['enrolled'] = $enrolled;

        $exempted = EnrolmentUnits::with('unit')->where('studentID', '=', $user->username)->where('status', '=', 'exempted')->get();
        $data['exempted'] = $exempted;

        return view('student.enrolmenthistory', $data);
    }

    public function downloadExcel()
    {
          $export = EnrolmentUnits::select('studentID','unitCode')->get();
          Excel::create('unit_list_student', function($excel) use ($export) {
          $excel->sheet('mySheet', function($sheet) use ($export){
            $sheet->fromArray($export);
          });
        })->download('xlsx');

   }

}
