<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentEnrolmentIssues extends Model
{
    protected $table = 'student_enrolment_issues';

    // inverse relation
    public function student()
	{
		return $this->belongsTo('App\Student', 'studentID', 'studentID');
	}

	public function course()
	{
		return $this->belongsTo('App\Course', 'courseCode', 'courseCode');
	}
}
