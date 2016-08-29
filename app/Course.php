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
		return $this->hasMany('App\UnitTerm', 'courseCode');
	}

    public function unit_term()
    {
        return $this->hasMany('App\Student', 'courseCode');
    }
}
