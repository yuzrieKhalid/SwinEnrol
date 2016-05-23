<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $table = 'student';

    // primary key
    protected $primaryKey = 'studentID';
    public $increments = false;

    // relation
    public function internal_course_transfer()
	{
		return $this->hasMany('App\InternalCourseTransfer', 'studentID');
	}

	public function student_enrolment_issues()
	{
		return $this->hasMany('App\StudentEnrolmentIssues', 'studentID');
	}

	public function enrolment_units()
	{
		return $this->hasMany('App\EnrolmentUnits', 'studentID');
	}
}
