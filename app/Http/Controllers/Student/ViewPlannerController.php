<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Student;
use App\StudyPlanner;

class ViewPlannerController extends Controller
{
    public function index() {
        // $student = Student::findOrFail($stdID);  // this may need extra parameter
        $unitlisting = StudyPlanner::all();         // this need to filter based on student's course

        $data = [];
        return view ('student.viewstudyplanner', $data);
    }
}
