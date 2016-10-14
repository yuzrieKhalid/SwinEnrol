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

    public function downloadExcel($id)
    {
        // if($id == 'csv'){
        //
        //   $data = Student::get()->toArray();
        //
        //   return Excel::create('unit_list', function($excel) use ($data) {
        //   $excel->sheet('mySheet', function($sheet) use ($data)
        //     {
        //       $sheet->fromArray($data);
        //       header('Content-Encoding: UTF-8');
        //       header('Content-type: text/csv; charset=UTF-8');
        //       header('Content-Disposition: attachment; filename=unit_list_student.csv');
        //       echo "\xEF\xBB\xBF";
        //     });
        //
        //   })->download($type);
        // }

        // else
        // {

        

          $data = EnrolmentUnits::get()->toArray();
          return Excel::create('unit_list_student', function($excel) use ($data) {
          $excel->sheet('mySheet', function($sheet) use ($data)
          {
            $sheet->fromArray($data);
          });
        })->download($id);
      //  }
   }

}
