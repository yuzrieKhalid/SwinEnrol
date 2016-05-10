<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Student;
use App\Unit;

class HomeController extends Controller
{
    public function index() {
        return view ('student.student');
    }
}
