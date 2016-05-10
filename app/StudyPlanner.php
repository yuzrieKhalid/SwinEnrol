<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyPlanner extends Model
{
    protected $table = 'study_planner';
    
    // inverse relation
    public function unit()
    {
        return $this->belongsTo('App\Unit', 'unitCode');
    }
}
