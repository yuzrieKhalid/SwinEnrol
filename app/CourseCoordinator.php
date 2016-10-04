<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseCoordinator extends Model
{
    // table properties
    protected $table = 'course_coordinator';

    // inverse relation
    public function users()
    {
        return $this->belongsTo('App\User', 'id', 'id');
    }

    public function course()
    {
        return $this->belongsTo('App\Course', 'courseCode', 'courseCode');
    }
}
