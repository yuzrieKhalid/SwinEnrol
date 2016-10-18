<?php

namespace App\Http\Controllers\Super;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\CourseCoordinator;
use App\Course;


class ManageCoordinator extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $course = Course::all();
        $data ['course'] = $course;
        $data['users'] = User::where('permissionLevel', '=', 2)->get();
        return view('super.managecoordinator', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data = [];
        // $course = Course::all();
        // $data ['course'] = $course;
        return view('super.managecoordinator_create';
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
            'username',
            'password',
            'name',
            'courseCode'
        ]);
        $user = new User;
        $cor = new CourseCoordinator;

        $user->username = $input['username'];
        $user->password = bcrypt($input['password']);
        $user->permissionLevel = 2;
        $user->save();

        $cor->username = $input['username'];
        $cor->name = $input['name'];
        $cor->courseCode = $input['courseCode'];
        $cor->save();

        return redirect('super/managecoordinator');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return response()->json(User::where('username', '=', $id)->get());
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data['user'] = User::where('username', '=', $id)->first()->username;
        $data['name'] = CourseCoordinator::where('username', '=', $id)->first()->name;
        $data['courseCode'] = CourseCoordinator::where('username', '=', $id)->first()->courseCode;

        return view('super.managecoordinator_create', $data);
        // return response()->json($data);
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
            'username',
            'password',
            'courseCode',
            'name'
        ]);

        $user = User::where('username', '=', $id)
        ->update([
            'username' => $input['username'],
            'password' => bcrypt($input['password'])
        ]);

        $coordinator = CourseCoordinator::where('username', '=', $input['username'])
        ->update([
            'username' => $input['username'],
            'courseCode' => $input['courseCode'],
            'name' => $input['name']
        ]);

        return redirect('super/managecoordinator');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('permissionLevel', '=', 2)
        ->where('username', '=', $id)
        ->delete();
        return redirect('super/managecoordinator');
    }
}
