<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use App\Student;
use App\User;

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
        // TODO: Return all data to the view
        // return response()->json(Student::all());     // when ready, use this
        return view ('admin.managestudents', $data);           // temporary, use this
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // maybe its better to create a new view to add student?
        // otherwise, it feels weird to have both landing page and create page
        // on the same view. As a User, I feel weird
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
            'email',
            'courseCode'
        ]);

        // create new student
        $student = new Student;
        $student->studentID = $input['studentID'];
        $student->surname = $input['surname'];
        $student->givenName = $input['givenName'];
        $student->email = $input['email'];
        $student->courseCode = $input['courseCode'];

        // adds the student to the User table too
        $user = new User;
        $user->username = $student->studentID;
        $user->password = bcrypt('newstudent');
        $user->permissionLevel = 'student';

        // save into database
        $student->save();
        $user->save();

        return response()->json($student);
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
        return view ('admin.managestudents', ['admin.managestudents' => Student::findOrFail($id)]);
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
            'surname',
            'givenName',
            'email',
            'courseCode'
        ]);

        // find student and update
        $student = Student::findOrFail($id);
        $student->studentID = $input['studentID'];
        $student->surname = $input['surname'];
        $student->givenName = $input['givenName'];
        $student->email = $input['email'];
        $student->courseCode = $input['courseCode'];

        $student->save();
        return response()->json($student);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return response()->json($student);
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
                $student->email = $value['email'];
                $student->courseCode = $value['coursecode'];
                $student->save();
            }
        }

        return response()->json($jsonArray);
    }
}

// console.log(studentsInfo[0].firstname); // this to help easier access the students
// let studentsInfo = {}
// // to access the students : console.log(students[0].sheet1[0].firstname);
// for (var i = 0; i < students[0].sheet1.length; i++) {
//     // to access each student : console.log(students[0].sheet1[i].firstname);
//     studentsInfo[i] = students[0].sheet1[i]
// }
