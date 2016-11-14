<?php

namespace App\Http\Controllers\Super;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

class ManageStudentAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::where('permissionLevel', '=', 3)->get();

        return view ('super.managestudentadmin', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('super.managestudentadmin_create');
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
        $user->permissionLevel = 3;
        $user->save();

        return redirect('super/managestudentadmin');
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
        $data['user'] = User::where('permissionLevel', '=', 3)
        ->where('username', '=', $id)
        ->get();

        // return response()->json($data);
        return view ('super.managestudentadmin_create', $data);
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

        $user = User::where('permissionLevel', '=', 3)
        ->where('username', '=', $id)
        ->update(['username' => $input['username']]);

        if($input['password'] != '')
        {
            $user = User::where('permissionLevel', '=', 3)
            ->where('username', '=', $id)
            ->update(['password' => bcrypt($input['password'])]);
        }

        return redirect('super/managestudentadmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('permissionLevel', '=', 3)
        ->where('username', '=', $id)
        ->delete();

        return redirect('super/managestudentadmin');
    }
}
