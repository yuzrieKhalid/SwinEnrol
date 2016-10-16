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
use App\UnitListing;
use App\StudyPlanner;
use App\StudentEnrolmentIssues;

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

    public function studyPlanner(Request $request)
    {
        $input = $request->only([
            'year',
            'term',
            'courseCode'
        ]);

        $year = Config::find('year')->value;
        $semester = Config::find('semester')->value;

        //$user = Auth::user();
        $student = Student::find($user->username);;

        if($input['year'] == 0)
        {
            $input['year'] = $year;
        }

        // default to current semester
        if($input['term'] == '')
            $input['term'] = $semester;

        // default to student's course
        if($input['courseCode'] == '')
            $input['courseCode'] = $student->courseCode;

        $data = [];
        $units = UnitTerm::with('unit', 'unit_type', 'course')
            ->where([
                ['unitType', '=', 'study_planner'],
                ['year', '=', $input['year']],
                ['term', '=', $input['term']],
                ['courseCode', '=', $input['courseCode']]
            ])
            ->get();
        $data['termUnits'] = $units;

        // get semester size
        $data['size'] = Config::find('semesterLength')->value;

        // get semester unit count
        for($n = 0; $n < $data['size']; $n++)
        {
            $count[$n] = UnitTerm::where([
                    ['year', '=', $year], // todo: get from user
                    ['term', '=', $semester], // todo: get from user
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
        $selectedCourse = Course::where('courseCode', '=', $input['courseCode'])->get();
        if(count($selectedCourse) > 0)
        {
            $data['courseCode'] = $selectedCourse[0]->courseCode;
            $data['courseName'] = $selectedCourse[0]->courseName;
        }
        else
        {
            $data['courseCode'] = '';
            $data['courseName'] = '';
        }

        // get all courses
        $data['courses'] = Course::all();

        return view ('student.manageunits', $data);
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

            // get all units in current course - according to study planner
            $courseUnits = StudyPlanner::with('course')
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
        ->where('year', '=', Config::find('year')->value)
        ->where('semester', '=', Config::find('semester')->value)
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

        // get all current units - according to UnitListing
        $allUnits = UnitListing::with('unit')
        ->where('year', '=', Config::find('year')->value)
        ->where('semester', '=', Config::find('semester')->value)
        ->get();

        // filter units according to level of study
        $units = [];
        foreach($allUnits as $unit)
        {
            if($unit['unit']->studyLevel == $course->studyLevel)
                array_push($units, $unit);
        }
        $data['units'] = $units;

        // sort units into long/short semesters
        $exists = false;
        $data['longSemester'] = [];
        $data['shortSemester'] = [];
        foreach($units as $unit)
        {
            if($unit->semesterLength == 'long')
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

            if($unit->semesterLength == 'short')
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

        $amendments = StudentEnrolmentIssues::where('studentID', '=', $user->username)
                                            ->where('issueID', '=', 4)->get();

        return view ('student.manageunits', $data);
        // return response()->json($amendments);
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
            'semesterLength'
        ]);

        $user = Auth::user();

        $unitCount = EnrolmentUnits::where('studentID', '=', $user->username)
        ->where('year', '=', Config::find('year')->value)
        ->where('semester', '=', Config::find('semester')->value)
        ->where('semesterLength', '=', $input['semesterLength'])
        ->where('status', '=', 'pending')
        ->count();

        if($unitCount < 4)
        {
            $unit = new EnrolmentUnits;
            $unit->studentID = Auth::user()->username;
            $unit->unitCode = $input['unitCode'];
            $unit->year = Config::find('year')->value;
            $unit->semester = Config::find('semester')->value;
            $unit->semesterLength = $input['semesterLength'];
            $unit->status = 'pending';
            $unit->result = 0.00;
            $unit->grade = 'ungraded';
            $unit->save();
        }
        else
        {
            return "Cannot enrol more than 4 units.";
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
            // ->where('studentID', '=', $studentID) // need to check for current semester too
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
     * adjustment_submit button onclick goes here
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->only([
            'unitCode',
            'semesterLength',
            'reason',
            'status'
        ]);

        $unitCount = EnrolmentUnits::where('studentID', '=', Auth::user()->username)
        ->where('year', '=', Config::find('year')->value)
        ->where('semester', '=', Config::find('semester')->value)
        ->where('semesterLength', '=', $input['semesterLength'])
        ->where('status', '=', 'pending')
        ->count();

        if($unitCount < 4)
        {
            $unit = new EnrolmentUnits;
            $unit->studentID = Auth::user()->username;
            $unit->unitCode = $input['unitCode'];
            $unit->year = Config::find('year')->value;
            $unit->semester = Config::find('semester')->value;
            $unit->semesterLength = $input['semesterLength'];
            $unit->status = $input['status'];
            $unit->result = 0.00;
            $unit->grade = 'ungraded';
            $unit->save();

            // create an amendment issue
            $issue = new StudentEnrolmentIssues;
            $issue->studentID = Auth::user()->username;
            $issue->issueID = 4; // amendment issue
            $issue->status = $input['status'];
            $issue->submissionData = $input['reason'];  // borrow this field as the reason
            $issue->attachmentData = $input['unitCode'];// borrow this field as the unitCode
            $issue->save();
        }
        else
        {
            return "Cannot enrol more than 4 units.";
        }

        return "ok";
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
            'semesterLength'
        ]);

        $user = Auth::user();
        $unit = EnrolmentUnits::where('unitCode', '=', $input['unitCode'])
        ->where('studentID', '=', Auth::user()->username)
        ->where('year', '=', Config::find('year')->value)
        ->where('semester', '=', Config::find('semester')->value)
        ->where('semesterLength', '=', $input['semesterLength'])
        ->delete();

        return response()->json($unit);
    }
}
