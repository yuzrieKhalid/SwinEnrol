<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';

    protected $fillable = [
        'studentID',
        'surname',
        'givenName',
        'email',
        'courseCode'
    ];
    // primary key
    protected $primaryKey = 'studentID';
    public $incrementing = false;

    // relation
	public function student_enrolment_issues()
	{
		return $this->hasMany('App\StudentEnrolmentIssues', 'studentID');
	}

	public function enrolment_units()
	{
		return $this->hasMany('App\EnrolmentUnits', 'studentID');
	}

    // inverse relation
    public function course()
    {
        return $this->belongsTo('App\Course', 'courseCode', 'courseCode');
    }
}
