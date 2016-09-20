<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\Student;
use App\Unit;
use App\EnrolmentUnits;
use DB;
use Carbon\Carbon;
use App\Config;
use App\Course;
use App\UnitTerm;

// student's unit operation is different. it should only add units to student's info

class ManageUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return response()->json();
        $data = [];

        $user = Auth::user();
        $student = Student::where('studentID', '=', '$user->username')->get();
        $data['student'] = $student;

        $enrolled = EnrolmentUnits::with('unit')->where('studentID', '=', $user->username)->get();
        $data['enrolled'] = $enrolled;

        $units = Unit::all();
        $data['units'] = $units;

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['phase'] = Config::find('enrolmentPhase');

        $user = Auth::user();
        $student = Student::find($user->username);
        $course = Course::find($student->courseCode);

        // check if foundation student
        if($course->studyLevel == 'Foundation')
        {
            $data['courses'] = Course::where('studyLevel', '=', 'degree')->get();

            // get all units in current course
            $courseUnits = UnitTerm::with('course')
            ->where('courseCode', '=', $student->courseCode)
            ->get();

            // get all completed units in current course
            $completedUnits = EnrolmentUnits::with('student')
            ->where('studentID', '=', $student->studentID)
            ->where('grade', '=', 'pass')
            ->get();

            // check foundation completion
            $completed = true;
            $status = false;
            foreach($courseUnits as $courseUnit)
            {
                foreach($completedUnits as $completedUnit)
                {
                    if($courseUnit->unitCode == $completedUnit->unitCode)
                    {
                        $status = true;
                        break;
                    }
                    else
                        $status = false;
                }
                if($status == false)
                    $completed = false;
            }
            // show form if foundation completed
            if($completed == true)
                return view('student.selectcourse', $data);
        }

        // get all enrolled units
        $enrolled = EnrolmentUnits::with('unit')
        ->where('studentID', '=', $user->username)
        ->where('status', '=', 'pending')
        ->get();

        // sort enrolled units into long/short semesters
        $data['enrolledLong'] = [];
        $data['enrolledShort'] = [];
        foreach($enrolled as $unit)
        {
            if($unit->semesterLength == 'long')
                array_push($data['enrolledLong'], $unit);
            if($unit->semesterLength == 'short')
                array_push($data['enrolledShort'], $unit);
        }

        // get all current units
        $allUnits = UnitTerm::with('course')
        ->with('unit')
        ->where('unitType', '=', 'unit_listing')
        ->where('year', '=', Config::find('year')->value)
        ->where('term', '=', Config::find('semester')->value)
        ->get();

        // filter units according to level of study
        $units = [];
        foreach($allUnits as $unit)
        {
            if($unit['course']->studyLevel == $course->studyLevel)
                array_push($units, $unit);
        }
        $data['units'] = $units;

        // sort units into long/short semesters
        $exists = false;
        $data['longSemester'] = [];
        $data['shortSemester'] = [];
        foreach($units as $unit)
        {
            if($unit->enrolmentTerm == 'long')
            {
                foreach($data['enrolledLong'] as $enrolledUnit)
                {
                    if($unit->unitCode == $enrolledUnit->unitCode)
                        $exists = true;
                }
                if($exists == false)
                    array_push($data['longSemester'], $unit);
                $exists = false;
            }

            if($unit->enrolmentTerm == 'short')
            {
                foreach($data['enrolledShort'] as $enrolledUnit)
                {
                    if($unit->unitCode == $enrolledUnit->unitCode)
                        $exists = true;
                }
                if($exists == false)
                    array_push($data['shortSemester'], $unit);
                $exists = false;
            }
        }

        return view ('student.manageunits', $data);
    }

    /**
     * Updates student's course when articulating
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function articulate(Request $request)
    {
        $input = $request->only([
            'courseCode'
        ]);

        $student = Student::find(Auth::user()->username);
        $student->courseCode = $input['courseCode'];
        $student->save();

        return redirect('student/manageunits/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->only([
            // enrolment data
            'unitCode',
            'enrolmentTerm'
        ]);

        $user = Auth::user();

        $unitCount = EnrolmentUnits::where('studentID', '=', $user->username)
        ->where('year', '=', Config::find('year')->value)
        ->where('term', '=', Config::find('semester')->value)
        ->where('semesterLength', '=', $input['enrolmentTerm'])
        ->where('status', '=', 'pending')
        ->count();

        if($unitCount <= 4)
        {
            $unit = new EnrolmentUnits;
            $unit->studentID = Auth::user()->username;
            $unit->unitCode = $input['unitCode'];
            $unit->year = Config::find('year')->value;
            $unit->term = Config::find('semester')->value;
            $unit->semesterLength = $input['enrolmentTerm'];
            $unit->status = 'pending';
            $unit->result = 0.00;
            $unit->grade = 'ungraded';
            $unit->save();
        }
        else
        {
            return "Cannot enrol more than 5 units.";
        }

        return "ok";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return response()->json();
        $data = [];

        // get units for student
        $units = DB::table('enrolment_units')
            ->join('unit', 'unit.unitCode', '=', 'enrolment_units.unitCode')
            ->select('enrolment_units.*', 'unit.unitName')
            // ->where('studentID', '=', $studentID) // need to check for current term too
            ->findOrFail($id);

        $data['units'] = $units;

        return view ('student.manageunits', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $input = $request->only([
            'unitCode',
            'enrolmentTerm'
        ]);

        $user = Auth::user();
        $unit = EnrolmentUnits::where('unitCode', '=', $input['unitCode'])
        ->where('studentID', '=', Auth::user()->username)
        ->where('year', '=', Config::find('year')->value)
        ->where('term', '=', Config::find('semester')->value)
        ->where('semesterLength', '=', $input['enrolmentTerm'])
        ->delete();

        return response()->json($unit);
    }
}
