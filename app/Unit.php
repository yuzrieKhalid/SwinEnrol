<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public $table = 'unit';
    // primary key
    protected $primaryKey = 'unitCode';
    public $incrementing = false;

    // unit relation
    public function unit_listing()
    {
        return $this->hasMany('App\UnitListing', 'unitCode');
    }

    public function enrolment_units()
    {
        return $this->hasMany('App\EnrolmentUnits', 'unitCode');
    }

    public function study_planner()
    {
        return $this->hasMany('App\StudyPlanner', 'unitCode');
    }

    // inverse relation
    public function course()
    {
        return $this->belongsTo('App\Course', 'courseCode');
    }
}
