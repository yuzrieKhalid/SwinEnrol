<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Config;
use App\EnrolmentUnits;

class PhaseController extends Controller
{
    /**
     * Approves units in the current enrolment
     *
     * @return json string with status
     */
    public function unitApprove()
    {
        // get config setting
        $data['status'] = $status = true;
        $data['year'] = $year = Config::find('year')->value;
        $data['term'] = $term = Config::find('semester')->value;
        $data['phase'] = $phase = Config::find('enrolmentPhase')->value;
        $data['failed'] = ''; // for debug
        $data['success'] = ''; // for debug

        // check if short/long semester
        if($phase == '2')
            $length = 'short';
        else
            $length = 'long';

        // get students with pending enrolment units
        $data['students'] = $students = EnrolmentUnits::distinct()
            ->select('studentID')
            ->where('year', '=', $year)
            ->where('term', '=', $term)
            ->where('semesterLength', '=', $length)
            ->where('status', '=', 'pending')
            ->get();

        // check business rules
        foreach($students as $student)
        {
            // get all student's current pending units
            $pending = EnrolmentUnits::with('unit')
            ->where('studentID', '=', $student->studentID)
            ->where('year', '=', $year)
            ->where('term', '=', $term)
            ->where('semesterLength', '=', $length)
            ->where('status', '=', 'pending')
            ->get();

            // sort units, move units with corequisite to the back
            $units = [];
            foreach($pending as $unit)
            {
                if($unit['unit']->corequisite == "")
                {
                    array_unshift($units, $unit);
                }
                else
                {
                    array_push($units, $unit);
                }
            }

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
                }

                // antirequisite
                $antirequisite = EnrolmentUnits::where('studentID', '=', $student->studentID)
                ->where('unitCode', '=', $unit['unit']->antirequisite)
                ->where('grade', '=', 'pass')
                ->get();
                if(count($antirequisite) > 0)
                {
                    $status = false;
                }

                // minimumCompletedUnits
                if($unit['unit']->minimumCompletedUnits > count($completed))
                {
                    $status = false;
                }

                // corequisite
                if($unit['unit']->corequisite != '')
                {
                    $corequisite = EnrolmentUnits::where('studentID', '=', $student->studentID)
                    ->where('unitCode', '=', $unit['unit']->corequisite)
                    ->where('status', '=', 'confirmed')
                    ->get();

                    if(count($corequisite) < 1)
                    {
                        $status = false;
                    }
                }

                if($status == true)
                {
                    EnrolmentUnits::where('studentID', '=', $student->studentID)
                    ->where('unitCode', '=', $unit->unitCode)
                    ->where('year', '=', $year)
                    ->where('term', '=', $term)
                    ->where('semesterLength', '=', $length)
                    ->update(['status' => 'confirmed']);

                    $data['success'] = $data['success'].$unit->unitCode.' '; // for debug
                }
                else
                {
                    EnrolmentUnits::where('studentID', '=', $student->studentID)
                    ->where('unitCode', '=', $unit->unitCode)
                    ->where('year', '=', $year)
                    ->where('term', '=', $term)
                    ->where('semesterLength', '=', $length)
                    ->update(['status' => 'dropped']);

                    $data['failed'] = $data['failed'].$unit->unitCode.' '; // for debug
                }
            }
        }

        // return response()->json($data); // for debug
        return $data;
    }

    // /**
    //  * Finalizes units in the current enrolment
    //  *
    //  * @return json string with status
    //  */
    // public function unitLock()
    // {
    //     // get config setting
    //     $phase = Config::find('enrolmentPhase')->value;
    //     $year = Config::find('year')->value;
    //     $semester = Config::find('semester')->value;
    //
    //     // check if short/long semester
    //     if($phase == '2')
    //         $length = 'short';
    //     else
    //         $length = 'long';
    //
    //     // update all pending units
    //     EnrolmentUnits::where('unitCode', '=', $unit->unitCode)
    //     ->where('year', '=', $year)
    //     ->where('term', '=', $term)
    //     ->where('semesterLength', '=', $length)
    //     ->update(['status' => 'confirmed']);
    // }

    /**
     * Checks for event to change enrolment phase
     *
     * @return json string with status
     */
    public function phaseTrigger()
    {
        $approval = [];
        // get config setting
        $phase = Config::find('enrolmentPhase');
        $year = Config::find('year');
        $semester = Config::find('semester');

        if($phase->value == '1')
        {
            $phase->value = '2';
        }
        else if($phase->value == '2')
        {
            $approval = $this->unitApprove();
            $phase->value = '3';
        }
        else if($phase->value == '3')
        {
            $phase->value = '4';
        }
        else if($phase->value == '4')
        {
            $phase->value = '5';
        }
        else if($phase->value == '5')
        {
            $approval = $this->unitApprove();
            $phase->value = '6';
        }
        else if($phase->value == '6')
        {
            $phase->value = '7';
        }
        else if($phase->value == '7')
        {
            $phase->value = '8';
        }
        else if($phase->value == '8')
        {
            if($semester->value == 'Semester 1')
            {
                // increment semester
                $semester->value = 'Semester 2';
                $semester->save();
                $phase->value = '1';
            }
            else
            {
                // increment year and semester
                $year->value = intval($year->value) + 1;
                $year->save();
                $semester->value = 'Semester 1';
                $semester->save();
                $phase->value = '1';
            }
        }

        $phase->save();
        $data['phase'] = $phase->value;
        $data['year'] = $year->value;
        $data['term'] = $semester->value;
        $data['approval'] = $approval;

    return response()->json($data);
    }
}
