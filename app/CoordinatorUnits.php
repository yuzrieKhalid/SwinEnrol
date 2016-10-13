<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoordinatorUnits extends Model
{
    protected $table = "coordinator_units";

    // inverse relation
    public function users()
    {
        return $this->belongsTo('App\User', 'username', 'username');
    }

    public function unit()
    {
        return $this->belongsTo('App\Unit', 'unitCode', 'unitCode');
    }
}
