<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CoordinatorController extends Controller
{
    public function index() {
        $data = [];
        $data['skill'] = "Test variable only";
        $data['asd'] = "\"This is a test page\" - Yuzrie 2016";
        return view ('coordinator.coordinator', $data);
    }

    public function view_managestudyplanner() {
        $data = [];
        return view ('coordinator.managestudyplanner', $data);
    }

    public function view_manageunitlisting() {
        $data = [];
        return view ('coordinator.manageunitlisting', $data);
    }

    public function view_manageunits() {
        $data = [];
        return view ('coordinator.manageunits', $data);
    }

    public function view_resolveenrolmentissues() {
        $data = [];
        return view ('coordinator.resolveenrolmentissues', $data);
    }
}
