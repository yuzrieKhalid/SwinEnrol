<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'unit';

    // primary key
    protected $primaryKey = 'unitCode';
    public $incrementing = false;

    // relation
    public function unit_term()
	{
		return $this->hasMany('App\UnitTerm', 'unitCode');
	}

	public function enrolment_units()
	{
		return $this->hasMany('App\EnrolmentUnits', 'unitCode');
	}

    public function requisite()
    {
        return $this->hasMany('App\Requisite', 'unitCode');
    }
}
