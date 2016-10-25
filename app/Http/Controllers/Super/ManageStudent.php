<?php

namespace App\Http\Controllers\Super;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

class ManageStudent extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data = [];
        $username = User::where('permissionLevel', '=', 1)->get();
        $data['users'] = $username;

        $student = $request->input('student');
        $ser = $username->where('student', 'LIKE', '%'.$student.'%');
        if(!empty($student))
          return view ('super.managestudent', $data)->withDetails($ser);
        else
          return view ('super.managestudent', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('super.managestudent_create');
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
            'password'
        ]);

        $user = new User;
        $user->username = $input['username'];
        $user->password = bcrypt($input['password']);
        $user->permissionLevel = 1;
        $user->save();

        return redirect('super/managestudent');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['user'] = User::where('permissionLevel', '=', 1)
        ->where('username', '=', $id)
        ->get();

        // return response()->json($data);
        return view ('super.managestudent_create', $data);
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
            'password'
        ]);

        $user = User::where('permissionLevel', '=', 1)
        ->where('username', '=', $id)
        ->update([
            'username' => $input['username'],
            'password' => $input['password']
        ]);

        return redirect('super/managestudent');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('permissionLevel', '=', 1)
        ->where('username', '=', $id)
        ->delete();

        return redirect('super/managestudent');
    }
}
