<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class StudentController extends Controller
{
    public function index() {
        $data = [];
        $data['skill'] = "Crash car into the wall";
        $data['asd'] = "Arslan is noob";
        return view ('student', $data);
    }
}
