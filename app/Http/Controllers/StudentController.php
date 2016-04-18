<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class StudentController extends Controller
{
    public function index() {
        $data = [];
        $data['skill'] = "Crash car into the wall";
        $data['asd'] = "\"Arslan is noob\" - Yuzrie 2016";
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
