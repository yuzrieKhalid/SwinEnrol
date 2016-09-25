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
use App\Requisite;

use Carbon\Carbon;

class ViewListingController extends Controller
{
    public function index() {
        $semester = Config::find('semester')->value; // get enrolment semester
        $year = Config::find('year')->value; // get enrolment year
        $studyLevel = Course::find(Student::find(Auth::user()->username)->courseCode)->studyLevel; // get student level of study

        // get long semester unit listing
        $units = UnitTerm::with('unit', 'unit_type', 'course')
            ->where('unitType', '=', 'unit_listing')
            ->where('year', '=', $year)
            ->where('term', '=', $semester)
            ->where('enrolmentTerm', '=', 'long')
            ->get();

        // return units that match study level
        $data['termUnits'] = [];
        foreach($units as $unit)
        {
            if($unit['course']->studyLevel == $studyLevel)
                array_push($data['termUnits'], $unit);
        }

        // get requisites
        $requisites = Requisite::all();

        // sort requisites
        $termUnits = $data['termUnits'];
        foreach($termUnits as $unit)
        {
            foreach($requisites as $requisite)
            {
                if($requisite->unitCode == $unit->unitCode)
                {
                    // prerequisite
                    if($requisite->type == 'prerequisite')
                        $data['requisite'][$unit->unitCode]['prerequisite'] = $requisite->requisite;

                    // corequisite
                    if($requisite->type == 'corequisite')
                        $data['requisite'][$unit->unitCode]['corequisite'] = $requisite->requisite;

                    // antirequisite
                    if($requisite->type == 'antirequisite')
                        $data['requisite'][$unit->unitCode]['antirequisite'] = $requisite->requisite;
                }
            }
        }

        // get short semester unit listing
        $units = UnitTerm::with('unit', 'unit_type')
            ->where('unitType', '=', 'unit_listing')
            ->where('year', '=', $year)
            ->where('term', '=', $semester)
            ->where('enrolmentTerm', '=', 'short')
            ->get();

        // return units that match study level
        $data['termUnitsShort'] = [];
        foreach($units as $unit)
        {
            if($unit['course']->studyLevel == $studyLevel)
                array_push($data['termUnitsShort'], $unit);
        }

        // get requisites
        foreach($data['termUnitsShort'] as $unit)
        {
            $requisites[$unit->unitCode] = Requisite::where('unitCode', '=', $unit->unitCode)->get();
            if(count($requisites[$unit->unitCode]) > 0)
            {
                // sort requisites by type
                foreach($requisites[$unit->unitCode] as $requisite)
                {
                    // prerequisite
                    if($requisite->type == 'prerequisite')
                        $data['requisiteShort'][$unit->unitCode]['prerequisite'] = $requisite->requisite;

                    // corequisite
                    if($requisite->type == 'corequisite')
                        $data['requisiteShort'][$unit->unitCode]['corequisite'] = $requisite->requisite;

                    // antirequisite
                    if($requisite->type == 'antirequisite')
                        $data['requisiteShort'][$unit->unitCode]['antirequisite'] = $requisite->requisite;
                }
            }
        }

        return view('student.viewunitlistings', $data);
    }
}
