<?php

namespace App\Http\Controllers\AdminOfficer;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $data = [];

        // return view
        return view('adminofficer.adminofficer', $data);
    }
}
