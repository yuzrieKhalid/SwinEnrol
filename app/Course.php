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
    public function unit()
	{
		return $this->hasMany('App\Unit', 'courseCode');
	}

	public function internal_course_transfer()
	{
		return $this->hasMany('App\InternalCourseTransfer', 'courseCode');
	}
}
