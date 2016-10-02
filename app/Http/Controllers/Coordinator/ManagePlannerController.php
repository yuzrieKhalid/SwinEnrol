<?php

namespace App\Http\Controllers\Coordinator;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\UnitTerm;
use App\Unit;
use App\Course;
use App\Config;
use App\Requisite;

use Carbon\Carbon;

class ManagePlannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(UnitTerm::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // get input from request
        $input = $request->only([
            'year',
            'term',
            'courseCode'
        ]);

        $year = Config::find('year')->value; // get enrolment year
        $semester = Config::find('semester')->value; // get enrolment semester

        // set to default value on first load
        if($input['year'] == 0)
        {
            $input['year'] = $year;
        }

        if($input['term'] == '')
            $input['term'] = $semester;

        // default to BCS for now
        if($input['courseCode'] == '')
            $input['courseCode'] = 'I047';

        // get study planner
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
        // return response()->json($data);

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

        // get all units
        $units = Unit::all();
        $data['units'] = $units;

        // get year
        $data['currentYear'] = Config::find('year')->value;

        // get year selection
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

        return view ('coordinator.managestudyplanner', $data);
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
            'unitCode',
            'year',
            'term',
            'enrolmentTerm',
            'courseCode'
        ]);

        $unit = new UnitTerm;
        $unit->unitType = 'study_planner';
        $unit->unitCode = $input['unitCode'];
        $unit->year = (int) $input['year'];
        $unit->term = $input['term'];
        $unit->enrolmentTerm = (int) $input['enrolmentTerm'];
        $unit->courseCode = $input['courseCode'];
        $unit->created_at = Carbon::now();
        $unit->updated_at = Carbon::now();
        $unit->save();

        return response()->json($unit);
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
        return view ('coordinator.managestudyplanner');
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
            'courseCode',
            'unitCode',
            'year',
            'term',
        ]);

        $planner = UnitTerm::findOrFail($id);
        $planner->courseCode = $input['courseCode'];
        $planner->unitCode = $input['unitCode'];
        $planner->year = $input['year'];
        $planner->term = $input['term'];
        $planner->unitType = 'study_planner';
        $planner->save();

        return response()->json($planner);
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
            'courseCode',
            'year',
            'term',
            'enrolmentTerm'
        ]);

        $planner = UnitTerm::where('unitCode', '=', $input['unitCode'])
            ->where('courseCode', '=', $input['courseCode'])
            ->where('year', '=', $input['year'])
            ->where('term', '=', $input['term'])
            ->where('enrolmentTerm', '=', $input['enrolmentTerm'])
            ->where('unitType', '=', 'study_planner')
            ->delete();

        return response()->json($planner);
    }
}
