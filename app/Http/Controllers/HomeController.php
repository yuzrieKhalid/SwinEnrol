<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->permissionLevel === '4')
            return view ('super.managestudentadmin');
        else if (Auth::user()->permissionLevel === '3')
            return view ('admin.studentadmin');
        else if (Auth::user()->permissionLevel === '2')
            return view ('coordinator.coordinator');

        // else (student)
        return view('student.student');
    }
}
