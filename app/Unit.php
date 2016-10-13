<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'unit';

    // primary key
    protected $primaryKey = 'unitCode';
    public $incrementing = false;

    // relation
	public function enrolment_units()
	{
		return $this->hasMany('App\EnrolmentUnits', 'unitCode');
	}

    public function unit_listing()
	{
		return $this->hasMany('App\UnitListing', 'unitCode');
	}

    public function requisite()
    {
        return $this->hasMany('App\Requisite', 'unitCode');
    }

    public function study_planner()
    {
        return $this->hasMany('App\StudyPlanner', 'unitCode');
    }

    public function coordinator_units()
    {
        return $this->hasMany('App\CoordinatorUnits', 'unitCode');
    }

    // inverse relation
    public function study_level()
    {
        return $this->belongsTo('App\StudyLevel', 'studyLevel', 'studyLevel');
    }
}
