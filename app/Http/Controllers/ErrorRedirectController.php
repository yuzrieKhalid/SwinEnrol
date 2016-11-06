<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ErrorRedirectController extends Controller
{
    // CASE: Duplicate Entry
    public function recordexist()
    {
        return view('errors.recordexist');
    }

    // CASE: Model Not Found
    public function modelnotfound()
    {
        return view('errors.modelnotfound');
    }

    // CASE: 403 Wrong Permission
    public function error403()
    {
        return view('errors.403');
    }

    // CASE: 404 Page Not Found
    public function error404()
    {
        return view('errors.404');
    }

    // CASE: 503 Website Down
    public function error503()
    {
        return view('errors.503');
    }
}
