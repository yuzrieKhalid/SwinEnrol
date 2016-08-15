<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\UnitTerm;
use DB;

class ViewListingController extends Controller
{
    public function index() {
        $units = UnitTerm::with('unit', 'unit_type')
            ->where('unitType', '=', 'unit_listing')
            ->where('enrolmentTerm', '=', '0')
            ->get();
        $data['termUnits'] = $units;

        $units = UnitTerm::with('unit', 'unit_type')
            ->where('unitType', '=', 'unit_listing')
            ->where('enrolmentTerm', '=', '1')
            ->get();
        $data['termUnitsShort'] = $units;

        return view ('student.viewunitlistings', $data);
        // return view ('student.viewunitlistings');
    }
}
