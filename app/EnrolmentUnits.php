<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnrolmentUnits extends Model
{
    protected $table = 'enrolment_units';

    protected $fillable = [
        'studentID',
        'unitCode',
        'year',
        'semester',
        'status',
        'grade'
    ];
    // inverse relation
    public function student()
	{
		return $this->belongsTo('App\Student', 'studentID', 'studentID');
	}

	public function unit()
	{
		return $this->belongsTo('App\Unit', 'unitCode', 'unitCode');
	}
}
