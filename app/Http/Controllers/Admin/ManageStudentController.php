<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use App\Student;
use App\User;
use App\Course;
use App\Config;
use Excel;
use App\StudentRecord;
use App\ExamUnit;
use App\EnrolmentUnits;

class ManageStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];

        $students = Student::all();
        $data['students'] = $students;

        // get today
        $now = Carbon::now()->format('d/m/Y');
        $data['now'] = $now;

        $data['courses'] = Course::all();

        return view ('admin.managestudents', $data);           // temporary, use this
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.managestudents');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Gets input from form and create new instance in the database
        $input = $request->only([
            'studentID',
            'surname',
            'givenName',
            'courseCode',
            'dateOfBirth'

        ]);

        // create new student
        $student = new Student;
        $student->studentID = $input['studentID'];
        $student->surname = $input['surname'];
        $student->givenName = $input['givenName'];
        $student->courseCode = $input['courseCode'];

        $student->year = Carbon::now()->year;
        $student->term = Config::findOrFail('semester')->value;;
        $student->save();

        // adds the student to the User table too
        $user = new User;
        $user->username = $student->studentID;
        $user->password = bcrypt($input['dateOfBirth']);
        $user->permissionLevel = '1';
        $user->save();

        return response()->json($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Student::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [];

        $data['student'] = Student::findOrFail($id);

        return view ('admin.managestudent_edit', $data);
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
        $input = $request->only([
            'studentID',
            'givenName',
            'surname',
            'courseCode',
            'password'
        ]);

        // find student and update
        $student = Student::where('studentID', '=', $id)->update([
            'studentID' => $input['studentID'],
            'surname' => $input['surname'],
            'givenName' => $input['givenName'],
            'courseCode' => $input['courseCode']
        ]);

        $user = User::where('username', '=', $id)->update([
            'username' => $input['studentID'],
            'password' => bcrypt($input['password']),
            'permissionLevel' => '1'
        ]);

        return 'updated';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::where('studentID', '=', $id);
        $student->delete();

        $user = User::where('username', '=', $id);
        $user->delete();

        // return response()->json($student);
        return 'deleted';
    }

    // Export into xls file format
    public function downloadExcel()
    {
        // translate the objects into an array
        $data = Student::get()->toArray();
        return Excel::create('Student_List', function($excel) use ($data) {     // create the file called Student_List
                $excel->sheet('mySheet', function($sheet)use($data) {           // create sheet called mySheet
                $sheet->fromArray($data);                                       // populate data from $data array into mySheet
            });
        })->export('xls'); // export into file format
    }

    /**
     * Check if the student's record exist or not
     * @param $record - one data from the whole get()
     * @param $existingItems - whole data from get()
     */
    function checkifStudentExist($record, $existingStudents)
    {
        foreach ($existingStudents as $existingStudent) {
            if ($record->studentID == $existingStudent->studentID)
                return true;
        }
        return false;
    }

    // Import new students from Eduversal and create entry for Swinenrol - StudentRecords
    public function importStudentRecords()
    {
        $data = [];

        // get from student records where not yet existing in swinenrol
        $swinenrolstudents = Student::all();        // get all to compare
        $eduversalstudents = StudentRecord::all();  // get all to compare
        $data['studentrecords'] = [];
        foreach ($eduversalstudents as $e_student) {
            // check if the student from eduversal exist in swinenrol
            if (!Self::checkifStudentExist($e_student, $swinenrolstudents))
                array_push($data['studentrecords'], $e_student);
        }

        foreach ($data['studentrecords'] as $newstudent) {
            // 1. create the user
            User::create([
                'username' => $newstudent->studentID,
                'password' => bcrypt($newstudent->dateOfBirth),
                'email' => $newstudent->studentID . '@students.swinburne.edu.my',
                'permissionLevel' => '1',
            ]);

            // 2. create the student entry
            Student::create([
                'studentID' => $newstudent->studentID,
                'surname' => $newstudent->surname,
                'givenName' => $newstudent->givenName,
                'courseCode' => $newstudent->courseCode,
                'year' => $newstudent->year,
                'term' => $newstudent->term,
            ]);
        }

        return redirect()->action('Admin\ManageStudentController@index');
    }

    // Import from Eduversal and update EnrolmentUnit - ExamUnits
    public function importExamUnits()
    {
        $data = [];
        $data['examunits'] = ExamUnit::all();

        // get enrolment units -> to see whether the enrolment updated or not
        $enrolmentunits = EnrolmentUnits::all();

        foreach ($data['examunits'] as $examunit) {
            foreach ($enrolmentunits as $enrolmentunit) {
                if ($examunit->studentID == $enrolmentunit->studentID &&
                    $examunit->unitCode == $enrolmentunit->unitCode)
                {
                    EnrolmentUnits::where('studentID', $examunit->studentID)
                    ->where('unitCode', $examunit->unitCode)
                    ->update([
                        'grade' => $examunit->grade
                    ]);
                }
            }
        }


        return response()->json($enrolmentunit);
    }

    /**
     * Sends a request to retrieve a file from the user
     *
     */
    public function fileUpload(Request $request)
    {
        $input = $request->only([
            'jsondata',
            'arrlength'
        ]);

        $arrlength = $input['arrlength'];
        $jsondata = $input['jsondata'];
        $jsonArray = json_decode($jsondata, true);

        foreach ($jsonArray as $data) {
            foreach ($data as $value) {
                $student = new Student;
                $student->studentID = $value['stdID'];
                $student->surname = $value['surname'];
                $student->givenName = $value['firstname'];
                $student->courseCode = $value['coursecode'];
                $student->save();
            }
        }

        return response()->json($jsonArray);
    }
}
