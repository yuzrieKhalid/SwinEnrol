<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $table = 'student';

    // primary key
    protected $primaryKey = 'studentID';

    // student relation
    public function enrolment_units()
    {
        return $this->hasMany('App\EnrolmentUnits', 'studentID');
    }

    public function internal_course_transfer()
    {
        return $this->hasMany('App\InternalCourseTransfer', 'studentID');
    }

    public function enrolment_issues()
    {
        return $this->hasMany('App\EnrolmentIssues', 'studentID');
    }
}
