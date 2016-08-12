<?php

namespace App\Http\Controllers\Coordinator;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\UnitTerm;
use App\Unit;
use App\Course;
use DB;

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
        $input = $request->only([
            'year',
            'term',
            'courseCode'
        ]);

        if($input['year'] == 0)
        {
            $year = Carbon::now();
            $input['year'] = $year->year;
        }

        if($input['term'] == '')
            $input['term'] = 'Semester 1';

        // default to BCS for now
        if($input['courseCode'] == '')
            $input['courseCode'] = 'I047';

        $data = [];
        $units = UnitTerm::with('unit', 'unit_type', 'course')
            ->where([
                ['unitType', '=', 'Study Planner'],
                ['year', '=', $input['year']],
                ['term', '=', $input['term']],
                ['courseCode', '=', $input['courseCode']]
            ])
            ->get();
        $data['termUnits'] = $units;

        // get semester size
        $data['size'] = 9;  // todo: change size to server configuration

        // get semester unit count
        for($n = 0; $n < $data['size']; $n++)
        {
            $count[$n] = DB::table('unit_term')
                ->where([
                    ['year', '=', '2016'], // todo: get from user
                    ['term', '=', 'Semester 1'], // todo: get from user
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

        // return response()->json($data);
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
        $unit->unitType = 'Study Planner';
        $unit->unitCode = $input['unitCode'];
        $unit->year = (int) $input['year'];
        $unit->term = $input['term'];
        $unit->enrolmentTerm = (int) $input['enrolmentTerm'];
        $unit->courseCode = $input['courseCode'];
        $unit->created_at = Carbon::now();
        $unit->updated_at = Carbon::now();
        $unit->save();

        // return response()->json($unit);
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
            ->where('courseCode', '=', $input['courseCode']) // todo: get course code from request
            ->where('year', '=', $input['year'])
            ->where('term', '=', $input['term'])
            ->where('enrolmentTerm', '=', $input['enrolmentTerm'])
            ->delete();

        return response()->json($planner);
    }
}
