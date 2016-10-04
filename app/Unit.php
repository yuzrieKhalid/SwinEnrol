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
	public function enrolment_units()
	{
		return $this->hasMany('App\EnrolmentUnits', 'unitCode');
	}

    public function unit_listing()
	{
		return $this->hasMany('App\UnitListing', 'unitCode');
	}

    public function requisite()
    {
        return $this->hasMany('App\Requisite', 'unitCode');
    }

    public function unit_type()
    {
        return $this->hasMany('App\UnitType', 'unitCode');
    }
}
