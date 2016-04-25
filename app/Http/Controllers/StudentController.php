<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Student;
use App\Unit;

class StudentController extends Controller
{
    public function index() {
        $data = [];
        $students = Student::all();
        $units = Unit::all();

        $data['students'] = $students;
        $data['units'] = $units;

        return view ('student.student', $data);
    }

    public function view_contactcoordinator() {
        $data = [];
        return view ('student.contactcoordinator', $data);
    }

    public function view_internalcoursetransfer() {
        $data = [];
        return view ('student.internalcoursetransfer', $data);
    }

    public function view_manageunits() {
        $data = [];
        return view ('student.manageunits', $data);
    }

    public function view_viewstudyplanner() {
        $data = [];
        return view ('student.viewstudyplanner', $data);
    }

    public function view_viewunitlistings() {
        $data = [];
        return view ('student.viewunitlistings', $data);
    }
}
