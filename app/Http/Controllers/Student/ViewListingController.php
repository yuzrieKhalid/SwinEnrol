<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\UnitListing;
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
        $units = UnitListing::with('unit')
            ->where('year', '=', $year)
            ->where('semester', '=', $semester)
            ->where('semesterLength', '=', 'long')
            ->get();

        // return units that match study level
        $data['semesterUnits'] = [];
        foreach($units as $unit)
        {
            // filter units according to level of study
            if($unit['unit']->studyLevel == $studyLevel)
                array_push($data['semesterUnits'], $unit);
        }

        // get requisites
        $requisites = Requisite::all();

        // sort requisites
        $semesterUnits = $data['semesterUnits'];
        foreach($semesterUnits as $unit)
        {
            foreach($requisites as $requisite)
            {
                if($requisite->unitCode == $unit->unitCode)
                {
                    // prerequisite
                    if($requisite->type == 'prerequisite')
                        $data['requisite'][$unit->unitCode]['prerequisite'][] = $requisite->requisite;

                    // corequisite
                    if($requisite->type == 'corequisite')
                        $data['requisite'][$unit->unitCode]['corequisite'][] = $requisite->requisite;

                    // antirequisite
                    if($requisite->type == 'antirequisite')
                        $data['requisite'][$unit->unitCode]['antirequisite'][] = $requisite->requisite;
                }
            }
        }

        // get short semester unit listing
        $units = UnitListing::with('unit')
            ->where('year', '=', $year)
            ->where('semester', '=', $semester)
            ->where('semesterLength', '=', 'short')
            ->get();

        // return units that match study level
        $data['semesterUnitsShort'] = [];
        foreach($units as $unit)
        {
            if($unit['unit']->studyLevel == $studyLevel)
                array_push($data['semesterUnitsShort'], $unit);
        }

        // get requisites
        foreach($data['semesterUnitsShort'] as $unit)
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
