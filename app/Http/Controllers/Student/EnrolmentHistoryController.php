<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

class EnrolmentHistoryController extends Controller
{
    public function index()
    {
        return view('student.enrolmenthistory');
    }
}
