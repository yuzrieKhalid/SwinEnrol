<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\UnitTerm;
use App\Config;
use App\Course;
use App\Student;

use Carbon\Carbon;

class ViewListingController extends Controller
{
    public function index() {
        $semester = Config::find('semester')->value;
        $year = Config::find('year')->value;
        $studyLevel = Course::find(Student::find(Auth::user()->username)->courseCode)->studyLevel;

        $units = UnitTerm::with('unit', 'unit_type', 'course')
            ->where('unitType', '=', 'unit_listing')
            ->where('year', '=', $year)
            ->where('term', '=', $semester)
            ->where('enrolmentTerm', '=', 'long')
            ->get();
        $data['termUnits'] = [];
        foreach($units as $unit)
        {
            if($unit['course']->studyLevel == $studyLevel)
                array_push($data['termUnits'], $unit);
        }

        $units = UnitTerm::with('unit', 'unit_type')
            ->where('unitType', '=', 'unit_listing')
            ->where('year', '=', $year)
            ->where('term', '=', $semester)
            ->where('enrolmentTerm', '=', 'short')
            ->get();
        $data['termUnitsShort'] = [];
        foreach($units as $unit)
        {
            if($unit['course']->studyLevel == $studyLevel)
                array_push($data['termUnitsShort'], $unit);
        }

        return view('student.viewunitlistings', $data);
    }
}
