<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyPlanner extends Model
{
    // table properties
    protected $table = 'study_planner';

    // inverse relation
    public function unit_type()
    {
        return $this->belongsTo('App\UnitType', 'unitCode', 'unitCode');
    }
}
