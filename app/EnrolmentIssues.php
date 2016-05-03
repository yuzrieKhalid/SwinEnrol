<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnrolmentIssues extends Model
{
    // primary key
    protected $primaryKey = 'issueID';

    // inverse relation
    public function student()
    {
        return $this->belongsTo('App\Student', 'studentID');
    }
}
