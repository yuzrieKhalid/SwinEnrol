<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Config;
use App\EnrolmentUnits;
use App\Unit;

class PhaseController extends Controller
{
    /**
     * Approves units in the current enrolment
     *
     * @return json string with status
     */
    public function unitApprove()
    {
        $data['status'] = $status = true;
        $data['year'] = $year = Config::find('year')->value;
        $data['term'] = $term = Config::find('semester')->value;
        $data['failed'] = ''; // for debug
        $data['success'] = ''; // for debug

        // get students with pending enrolment units
        $data['students'] = $students = EnrolmentUnits::distinct()
            ->select('studentID')
            ->where('year', '=', $year)
            ->where('term', '=', $term)
            ->where('status', '=', 'pending')
            ->get();

        // check business rules
        foreach($students as $student)
        {
            $pending = EnrolmentUnits::with('unit')
            ->where('studentID', '=', $student->studentID)
            ->where('year', '=', $year)
            ->where('term', '=', $term)
            ->where('status', '=', 'pending')
            ->get();

            $completed = EnrolmentUnits::where('studentID', '=', $student->studentID)
            ->where('grade', '=', 'pass')
            ->get();

            foreach($pending as $unit)
            {
                $status = true;

                // already completed
                foreach($completed as $completedUnit)
                {
                    if($unit->unitCode == $completedUnit->unitCode)
                    {
                        $status = false;
                        $data['failed'] = $data['failed'].$unit->unitCode.' '; // for debug
                    }
                }

                // prerequisite
                if($unit['unit']->prerequisite != '')
                {
                    // check if prerequisite is passed
                    foreach($completed as $completedUnit)
                    {
                        $status = false;
                        if($completedUnit->unitCode == $unit['unit']->prerequisite && $completedUnit->grade == 'pass')
                        {
                            $status = true;
                            break;
                        }
                    }
                    if($status == false)
                    {
                        $data['failed'] = $data['failed'].$unit->unitCode.' '; // for debug
                    }
                }

                // antirequisite
                $antirequisite = EnrolmentUnits::where('studentID', '=', $student->studentID)
                ->where('unitCode', '=', $unit['unit']->antirequisite)
                ->where('grade', '=', 'pass')
                ->get();
                if(count($antirequisite) > 0)
                {
                    $status = false;
                    $data['failed'] = $data['failed'].$unit->unitCode.' '; // for debug
                }

                // minimumCompletedUnits
                if($unit['unit']->minimumCompletedUnits > count($completed))
                {
                    $status = false;
                    $data['failed'] = $data['failed'].$unit->unitCode.' '; // for debug
                }

                if($status == true)
                {
                    EnrolmentUnits::where('studentID', '=', '4304373')
                    ->where('unitCode', '=', $unit->unitCode)
                    ->where('year', '=', $year)
                    ->where('term', '=', $term)
                    ->update(['status' => 'confirmed']);

                    $data['success'] = $data['success'].$unit->unitCode.' '; // for debug
                }
                else
                {
                    EnrolmentUnits::where('studentID', '=', '4304373')
                    ->where('unitCode', '=', $unit->unitCode)
                    ->where('year', '=', $year)
                    ->where('term', '=', $term)
                    ->update(['status' => 'dropped']);
                }
            }
        }

        // return response()->json($data); // for debug
        return $data;
    }

    /**
     * Checks for event to change enrolment phase
     *
     * @return json string with status
     */
    public function phaseTrigger()
    {
        $phase = Config::find('enrolmentPhase');
        $year = Config::find('year');

        if($phase->value == '1')
        {
            $phase->value = '2';
            $data['approval'] = $this->unitApprove();
        }
        else if($phase->value == '2')
        {
            $phase->value = '3';
        }
        else if($phase->value == '3')
        {
            $phase->value = '1';
            $year->value = intval($year->value) + 1;
            $year->save();
        }

        $phase->save();
        $data['phase'] = $phase->value;
        $data['year'] = $year;

    return response()->json($data);
    }
}
