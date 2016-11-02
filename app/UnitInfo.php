<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitInfo extends Model
{
    // table properties
    protected $table = 'unit_info';

    // inverse relation
    public function unit()
    {
        return $this->belongsTo('App\Unit', 'unitCode', 'unitCode');
    }
}
