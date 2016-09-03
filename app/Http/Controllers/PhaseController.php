<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Config;

class PhaseController extends Controller
{
    /**
     * Approves units in the current enrolment
     *
     * @return json string with status
     */
    public function unitApprove()
    {
        $data['status'] = true;

        return response()->json($data);
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
