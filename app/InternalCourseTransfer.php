<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InternalCourseTransfer extends Model
{
    // primary key
    protected $primaryKey = 'formID';
    protected $table = 'internal_course_transfer';

    // inverse relation
    public function student()
    {
        return $this->belongsTo('App\Student', 'studentID');
    }

    public function course()
    {
        return $this->belongsTo('App\Course', 'courseCode');
    }
}
