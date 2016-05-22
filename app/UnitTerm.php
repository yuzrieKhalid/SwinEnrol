<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitTerm extends Model
{
    protected $table = 'unit_term';

    // inverse relation
    public function unit_type()
	{
		return $this->belongsTo('App\UnitType', 'unitType', 'unitType');
	}

	public function unit()
	{
		return $this->belongsTo('App\Unit', 'unitCode', 'unitCode');
	}
}
