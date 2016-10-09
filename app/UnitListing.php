<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitListing extends Model
{
    // table properties
    protected $table = 'unit_listing';

    // inverse relation
    public function unit()
    {
        return $this->belongsTo('App\Unit', 'unitCode', 'unitCode');
    }
}
