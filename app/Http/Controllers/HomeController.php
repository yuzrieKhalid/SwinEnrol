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
        if(Auth::user()->permissionLevel === '4')
            return redirect()->action('Super\HomeController@index');
        else if(Auth::user()->permissionLevel === '3')
            return redirect()->action('Admin\HomeController@index');
        else if(Auth::user()->permissionLevel === '2')
            return redirect()->action('Coordinator\HomeController@index');
        else if(Auth::user()->permissionLevel === '5')
            return redirect()->action('AdminOfficer\HomeController@index');

        // else (student)
        return redirect()->action('Student\HomeController@index');
    }
}
