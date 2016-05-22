<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitType extends Model
{
    protected $table = 'unit_type';

    // primary key
    protected $primaryKey = 'unitType';
	public $increments = false;

    // relation
    public function unit_term()
	{
		return $this->hasMany('App\UnitTerm', 'unitType');
	}
}
