<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\EnrolmentUnits;
use App\Student;
use Auth;

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

    public function downloadExcel($type)
    {
        if($type == 'csv'){

          $data = Student::get()->toArray();

          return Excel::create('demo_example', function($excel) use ($data) {
          $excel->sheet('mySheet', function($sheet) use ($data)
            {
              $sheet->fromArray($data);
              header('Content-Encoding: UTF-8');
              header('Content-type: text/csv; charset=UTF-8');
              header('Content-Disposition: attachment; filename=itsolutionstuff_example.csv');
              echo "\xEF\xBB\xBF";
            });

          })->download($type);
        }

        else
        {
          $data = Student::get()->toArray();
          return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
          $excel->sheet('mySheet', function($sheet) use ($data)
          {
            $sheet->fromArray($data);
          });

        })->download($type);

       }
   }

}
