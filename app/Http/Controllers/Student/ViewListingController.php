<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Student;
use App\UnitListing;

class ViewListingController extends Controller
{
    public function index() {
        // $student = Student::findOrFail($stdID);  // this may need extra parameter
        $unitlisting = UnitListing::all();          // this need to filter based on student's course

        $data = [];
        return view ('student.viewunitlistings', $data);
    }
}
