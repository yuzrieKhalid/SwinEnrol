<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnrolmentUnits extends Model
{
    protected $table = 'enrolment_units';
    
    // inverse relation
    public function unit()
    {
        return $this->belongsTo('App\Unit', 'unitCode');
    }
}
