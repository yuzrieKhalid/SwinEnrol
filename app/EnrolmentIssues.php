<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnrolmentIssues extends Model
{
    protected $table = 'enrolment_issues';

    // primary key
    protected $primaryKey = 'issueID';

    // relation
    public function student_enrolment_issues()
	{
		return $this->hasMany('App\StudentEnrolmentIssues', 'issueID');
	}
}
