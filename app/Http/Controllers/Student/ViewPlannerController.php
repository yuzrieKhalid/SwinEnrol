<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\UnitTerm;
use App\Course;
use App\Student;
use App\Config;
use App\Requisite;

use Carbon\Carbon;

class ViewPlannerController extends Controller
{
    public function index(Request $request)
    {
        // get input from request
        $input = $request->only([
            'year',
            'term',
            'courseCode'
        ]);

        $year = Config::find('year')->value; // get enrolment year
        $semester = Config::find('semester')->value; // get enrolment semester

        $user = Auth::user(); // get user
        $student = Student::find($user->username); // get student

        // default to student's intake year
        if($input['year'] == 0)
        {
            $input['year'] = $student->year;
        }

        // default to student's intake semester
        if($input['term'] == '')
            $input['term'] = $student->term;

        // default to student's course
        if($input['courseCode'] == '')
            $input['courseCode'] = $student->courseCode;

        // get student's study planner
        $units = UnitTerm::with('unit', 'unit_type', 'course')
            ->where([
                ['unitType', '=', 'study_planner'],
                ['year', '=', $input['year']],
                ['term', '=', $input['term']],
                ['courseCode', '=', $input['courseCode']]
            ])
            ->get();
        $data['termUnits'] = $units;

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

        // get semester size
        $data['size'] = Config::find('semesterLength')->value;

        // get semester unit count
        for($n = 0; $n < $data['size']; $n++)
        {
            $count[$n] = UnitTerm::where([
                    ['year', '=', $input['year']],
                    ['term', '=', $input['term']],
                    ['courseCode', '=', $input['courseCode']],
                    ['enrolmentTerm', '=', $n]
                ])->count();
        }
        $data['count'] = $count;

        // generate year/semester strings
        for($n = 0; $n < $data['size']; $n++)
            $term[$n] = 'Year ' . (1 + (($n - $n % 3) / 3)) . ' Semester ' . (1 + $n % 3);
        $data['term'] = $term;

        // get current year
        $data['currentYear'] = Carbon::now()->year;

        // get year
        $data['year'] = $input['year'];

        // get semester
        $data['semester'] = $input['term'];

        // get selected course
        $selectedCourse = Course::find($input['courseCode']);
        if(count($selectedCourse) > 0)
        {
            $data['courseCode'] = $selectedCourse->courseCode;
            $data['courseName'] = $selectedCourse->courseName;
        }
        else
        {
            $data['courseCode'] = '';
            $data['courseName'] = '';
        }

        // get all courses
        $data['courses'] = Course::all();

        return view('student.viewstudyplanner', $data);
    }
}
