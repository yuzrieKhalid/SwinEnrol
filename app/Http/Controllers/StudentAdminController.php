<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class StudentAdminController extends Controller
{
    public function index() {
        $data = [];
        return view ('admin.studentadmin', $data);
    }

    public function view_managestudents() {
        $data = [];
        return view ('admin.managestudents', $data);
    }

    public function view_setenrolmentdates() {
        $data = [];
        return view ('admin.setenrolmentdates', $data);
    }

}
