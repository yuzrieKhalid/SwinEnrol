<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\InternalCourseTransfer;

class CourseTransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return response()->json(InternalCourseTransfer::all());
        return view ('student.internalcoursetransfer');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('student.internalcoursetransfer');
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
            'studentID',
            'comment',
            'courseCode',
        ]);

        $transfer = new InternalCourseTransfer;
        $transfer->studentID = $input['studentID'];
        $transfer->comment = $input['comment'];
        $transfer->courseCode = $input['courseCode'];

        $transfer->save();
        return response()->json($transfer);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view ('student.internalcoursetransfer');
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
            'comment',
            'courseCode',
        ]);

        $transfer = InternalCourseTransfer::findOrFail($id);
        $transfer->studentID = $input['studentID'];
        $transfer->comment = $input['comment'];
        $transfer->courseCode = $input['courseCode'];

        $transfer->save();
        return response()->json($transfer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transfer = InternalCourseTransfer::findOrFail($id);
        $transfer->delete();

        return response()->json($transfer);
    }
}
