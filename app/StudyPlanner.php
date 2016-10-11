<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyPlanner extends Model
{
    // table properties
    protected $table = 'study_planner';

    // inverse relation
    public function unit()
	{
		return $this->belongsTo('App\Unit', 'unitCode', 'unitCode');
	}

    public function course()
    {
        return $this->belongsTo('App\Course', 'courseCode', 'courseCode');
    }

    public function type()
    {
        return $this->belongsTo('App\UnitType', 'unitType', 'unitType');
    }
}
