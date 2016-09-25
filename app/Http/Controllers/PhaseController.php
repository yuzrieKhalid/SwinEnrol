<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Config;
use App\EnrolmentUnits;
use App\Requisite;
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
        // get config setting
        $status = true;
        $year = Config::find('year')->value;
        $term = Config::find('semester')->value;
        $phase = Config::find('enrolmentPhase')->value;
        $success = [];
        $failed = [];

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
                $requisites = Requisite::where('unitCode', '=', $unit->unitCode)
                ->where('type', '=', 'corequisite')
                ->get();
                if(count($requisites) > 0)
                {
                    $units[] = $unit;
                }
                else
                {
                    array_unshift($units, $unit);
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
                $prerequisites = Requisite::where('unitCode', '=', $unit->unitCode)
                ->where('type', '=', 'prerequisite')
                ->get();
                if(count($prerequisites) > 0)
                {
                    // check if prerequisites are passed
                    $count = 0;
                    foreach($prerequisites as $prerequisite)
                    {
                        foreach($completed as $completedUnit)
                        {
                            if($completedUnit->unitCode == $prerequisite->requisite)
                            {
                                $count++;
                            }
                        }
                    }
                    if($count != count($prerequisites))
                        $status = false;
                }

                // get antirequisites
                $antirequisites = Requisite::where('unitCode', '=', $unit->unitCode)
                ->where('type', '=', 'antirequisite')
                ->get();

                if(count($antirequisites) > 0)
                {
                    // check antirequisites
                    foreach($antirequisites as $antirequisite)
                    {
                        foreach($completed as $completedUnit)
                        {
                            if($antirequisite->requisite == $completedUnit->unitCode)
                                $status = false;
                        }
                    }
                }

                // minimumCompletedUnits
                if($unit['unit']->minimumCompletedUnits > count($completed))
                {
                    $status = false;
                }

                // corequisite
                $corequisites = Requisite::where('unitCode', '=', $unit->unitCode)
                ->where('type', '=', 'corequisite')
                ->get();
                if(count($corequisites) > 0)
                {
                    $count = 0;
                    foreach($corequisites as $corequisite)
                    {
                        foreach($success as $approved)
                        {
                            if($approved == $corequisite->requisite)
                            {
                                $count++;
                            }
                        }
                        foreach($completed as $completedUnit)
                        {
                            if($completedUnit->unitCode == $corequisite->unitCode)
                            {
                                $count++;
                            }
                        }
                    }
                    if($count != count($corequisites))
                        $status = false;
                }

                if($status == true)
                {
                    EnrolmentUnits::where('studentID', '=', $student->studentID)
                    ->where('unitCode', '=', $unit->unitCode)
                    ->where('year', '=', $year)
                    ->where('term', '=', $term)
                    ->where('semesterLength', '=', $length)
                    ->update(['status' => 'confirmed']);

                    $success[] = $unit->unitCode;
                }
                else
                {
                    EnrolmentUnits::where('studentID', '=', $student->studentID)
                    ->where('unitCode', '=', $unit->unitCode)
                    ->where('year', '=', $year)
                    ->where('term', '=', $term)
                    ->where('semesterLength', '=', $length)
                    ->update(['status' => 'dropped']);

                    $failed[] = $unit->unitCode;
                }
            }
        }

        // debug
        $data['status'] = $status;
        $data['year'] = $year;
        $data['term'] = $term;
        $data['phase'] = $phase;
        $data['success'] = $success;
        $data['failed'] = $failed;

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

        // debug
        $data['phase'] = $phase->value;
        $data['year'] = $year->value;
        $data['term'] = $semester->value;
        $data['approval'] = $approval;

    return response()->json($data);
    }
}
