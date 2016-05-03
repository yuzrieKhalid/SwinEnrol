<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnrolmentUnits extends Model
{
    // inverse relation
    public function unit()
    {
        return $this->belongsTo('App\Unit', 'unitCode');
    }
}
