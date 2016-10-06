<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';

    // primary key
    protected $primaryKey = 'courseCode';
    public $incrementing = false;

    // relation
    public function study_planner()
	{
		return $this->hasMany('App\StudyPlanner', 'courseCode');
	}

    public function student()
    {
        return $this->hasMany('App\Student', 'courseCode');
    }

    public function course_coordinator()
    {
        return $this->hasMany('App\CourseCoordinator', 'courseCode');
    }

    public function graduation_requirements()
    {
        return $this->hasMany('App\GraduationRequirements', 'courseCode');
    }
}
