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
        if (Auth::user()->permissionLevel === 'super')
            return view ('super.managestudentadmin');
        else if (Auth::user()->permissionLevel === 'admin')
            return view ('admin.studentadmin');
        else if (Auth::user()->permissionLevel === 'coordinator')
            return view ('coordinator.coordinator');

        // else (student)
        return view('student.student');
    }
}
