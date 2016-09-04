<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\UnitTerm;
use App\Config;

use Carbon\Carbon;

class ViewListingController extends Controller
{
    public function index() {
        $semester = Config::find('semester')->value;
        $year = Config::find('year')->value;

        $units = UnitTerm::with('unit', 'unit_type')
            ->where('unitType', '=', 'unit_listing')
            ->where('year', '=', $year)
            ->where('term', '=', $semester)
            ->where('enrolmentTerm', '=', 'long')
            ->get();
        $data['termUnits'] = $units;

        $units = UnitTerm::with('unit', 'unit_type')
            ->where('unitType', '=', 'unit_listing')
            ->where('year', '=', $year)
            ->where('term', '=', $semester)
            ->where('enrolmentTerm', '=', 'short')
            ->get();
        $data['termUnitsShort'] = $units;

        return view ('student.viewunitlistings', $data);
        // return view ('student.viewunitlistings');
    }
}
