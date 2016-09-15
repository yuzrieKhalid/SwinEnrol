<?php

namespace App\Http\Controllers\Super;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Config;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get config data
        $data['enrolmentPhase'] = Config::find('enrolmentPhase');
        $data['semester'] = Config::find('semester');
        $data['year'] = Config::find('year');
        $data['semesterLength'] = Config::find('semesterLength');
        $data['approvalShort'] = Config::find('approvalShort');
        $data['addCloseShort'] = Config::find('addCloseShort');
        $data['dropCloseShort'] = Config::find('dropCloseShort');
        $data['approvalLong'] = Config::find('approvalLong');
        $data['addCloseLong'] = Config::find('addCloseLong');
        $data['dropCloseLong'] = Config::find('dropCloseLong');

        return view('super.config', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'enrolmentPhase',
            'semester',
            'year',
            'semesterLength',
            'approvalShort',
            'addCloseShort',
            'dropCloseShort',
            'approvalLong',
            'addCloseLong',
            'dropCloseLong',
        ]);

        $data['status'] = true;

        // get config data
        $data['enrolmentPhase'] = Config::find('enrolmentPhase');
        $data['semester'] = Config::find('semester');
        $data['year'] = Config::find('year');
        $data['semesterLength'] = Config::find('semesterLength');
        $data['approvalShort'] = Config::find('approvalShort');
        $data['addCloseShort'] = Config::find('addCloseShort');
        $data['dropCloseShort'] = Config::find('dropCloseShort');
        $data['approvalLong'] = Config::find('approvalLong');
        $data['addCloseLong'] = Config::find('addCloseLong');
        $data['dropCloseLong'] = Config::find('dropCloseLong');

        // Enrolment Phase
        $data['enrolmentPhase']->value = $input['enrolmentPhase'];
        if($data['enrolmentPhase']->value < 1 || $data['enrolmentPhase']->value > 8 || !is_numeric($input['enrolmentPhase']))
        {
            $data['status'] = false;
            $data['error']['enrolmentPhase'] = 'Enrolment Phase must be between values 1 and 8.';
        }

        // Semester
        $data['semester']->value = $input['semester'];

        // Semester Length
        $data['semesterLength']->value = $input['semesterLength'];
        if($data['semesterLength']->value < 1 || !is_numeric($input['semesterLength']))
        {
            $data['status'] = false;
            $data['error']['semesterLength'] = 'Semester Length must be a number greater than 0.';
        }

        // Year
        $data['year']->value = $input['year'];
        if($data['year']->value < 1 || !is_numeric($input['year']))
        {
            $data['status'] = false;
            $data['error']['year'] = 'Year must be a number greater than 0.';
        }

        // Approval (Short)
        $data['approvalShort']->value = $input['approvalShort'];
        if($data['approvalShort']->value < 1 || !is_numeric($input['approvalShort']))
        {
            $data['status'] = false;
            $data['error']['approvalShort'] = 'Value must be a number greater than 0.';
        }

        // Add Close (Short)
        $data['addCloseShort']->value = $input['addCloseShort'];
        if($data['addCloseShort']->value < 1 || !is_numeric($input['addCloseShort']))
        {
            $data['status'] = false;
            $data['error']['addCloseShort'] = 'Value must be a number greater than 0.';
        }

        // Drop Close (Short)
        $data['dropCloseShort']->value = $input['dropCloseShort'];
        if($data['dropCloseShort']->value < 1 || !is_numeric($input['dropCloseShort']))
        {
            $data['status'] = false;
            $data['error']['dropCloseShort'] = 'Value must be a number greater than 0.';
        }

        // Approval (Long)
        $data['approvalLong']->value = $input['approvalLong'];
        if($data['approvalLong']->value < 1 || !is_numeric($input['approvalLong']))
        {
            $data['status'] = false;
            $data['error']['approvalLong'] = 'Value must be a number greater than 0.';
        }

        // Add Close (Long)
        $data['addCloseLong']->value = $input['addCloseLong'];
        if($data['addCloseLong']->value < 1 || !is_numeric($input['addCloseLong']))
        {
            $data['status'] = false;
            $data['error']['addCloseLong'] = 'Value must be a number greater than 0.';
        }

        // Drop Close (Long)
        $data['dropCloseLong']->value = $input['dropCloseLong'];
        if($data['dropCloseLong']->value < 1 || !is_numeric($input['dropCloseLong']))
        {
            $data['status'] = false;
            $data['error']['dropCloseLong'] = 'Value must be a number greater than 0.';
        }

        // save changes
        if($data['status'] == true)
        {
            $data['enrolmentPhase']->save();
            $data['semester']->save();
            $data['semesterLength']->save();
            $data['year']->save();
            $data['approvalShort']->save();
            $data['addCloseShort']->save();
            $data['dropCloseShort']->save();
            $data['approvalLong']->save();
            $data['addCloseLong']->save();
            $data['dropCloseLong']->save();
        }

        $data['config'] = Config::all();

        return view('super.config', $data);
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
    public function destroy($id)
    {
        //
    }
}
