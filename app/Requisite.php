<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requisite extends Model
{
    protected $table = 'requisite';

    // inverse relation
    public function unit()
    {
        return $this->belongsTo('App\Unit', 'unitCode', 'unitCode');
    }
}
