<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Config;
use App\EnrolmentUnits;
use App\Student;

class HomeController extends Controller
{
    public function index() {

        $data = [];

        // get phase information
        $data['phase'] = Config::find('enrolmentPhase')->value;
        $data['year'] = Config::find('year')->value;
        $data['semester'] = Config::find('semester')->value;

        // get unit approval information
        $data['studentCount'] = EnrolmentUnits::distinct()
            ->select('studentID')
            ->where('year', '=', $data['year'])
            ->where('semester', '=', $data['semester'])
            ->where('status', '=', 'pending')
            ->get();

        // get all student's current pending units
        $data['unitCount'] = EnrolmentUnits::where('year', '=', $data['year'])
        ->where('semester', '=', $data['semester'])
        ->where('status', '=', 'pending')
        ->count();

        // get all student information
        $studentID = Student::all();
        $data['studentID'] = $studentID;

        //$data = count($studentAll);
        $n = 0;
        $x = [2014,2015,2016,2017];
        $y = [3,6,9,12];
        // first pass: read in data, compute xbar and ybar
        $sumx = 0;
        $sumy = 0;
        //$sumx2 = 0;

        while($n<4) {
            $sumx  += $x[$n];
            //$sumx2 += $x[$n] * $x[$n];
            $sumy  += $y[$n];
            $n++;
        }

        $xbar = $sumx / $n;
        $ybar = $sumy / $n;

        // second pass: compute summary statistics
        $xxbar = 0;
        $yybar = 0;
        $xybar = 0;

        for ($i = 0; $i < $n; $i++) {
            $xxbar += ($x[$i] - $xbar) * ($x[$i] - $xbar);
            $yybar += ($y[$i] - $ybar) * ($y[$i] - $ybar);
            $xybar += ($x[$i] - $xbar) * ($y[$i] - $ybar);
        }
        $beta1 = $xybar / $xxbar;
        $beta0 = $ybar - $beta1 * $xbar;

        // analyze results
        $df = $n - 2;
        $rss = 0;      // residual sum of squares
        $ssr = 0;      // regression sum of squares
        for ($i = 0; $i < $n; $i++) {
            $fit = $beta1*$x[$i] + $beta0;
            $rss += ($fit - $y[$i]) * ($fit - $y[$i]);
            $ssr += ($fit - $ybar) * ($fit - $ybar);
        }

        $data['fit']= $fit;
        $data['rss']= $rss;
        $data['ssr']= $ssr;

        return view ('admin.studentadmin', $data);
    }

}
