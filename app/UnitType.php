<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitType extends Model
{
    // table properties
    protected $table = 'unit_type';
    protected $primaryKey = 'unitType';
    public $incrementing = false;

    // relation
    public function study_planner()
    {
        return $this->hasMany('App\StudyPlanner', 'unitType');
    }

    public function graduation_requirements()
    {
        return $this->hasMany('App\GraduationRequirements', 'unitType');
    }
}
