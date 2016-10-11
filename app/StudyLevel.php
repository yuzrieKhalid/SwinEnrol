<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyLevel extends Model
{
    // table properties
    protected $table = 'study_level';
    protected $primaryKey = 'studyLevel';
    public $incrementing = false;

    // relation
    public function course()
    {
        return $this->hasMany('App\Course', 'studyLevel');
    }

    public function unit()
    {
        return $this->hasMany('App\Unit', 'studyLevel');
    }
}
