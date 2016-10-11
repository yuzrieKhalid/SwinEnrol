<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    // table properties
    protected $table = 'type';
    protected $primaryKey = 'typeId';
    public $incrementing = false;

    // relation
    public function unit_type()
    {
        return $this->hasMany('App\UnitType', 'typeId');
    }

    public function graduation_requirements()
    {
        return $this->hasMany('App\GraduationRequirements', 'typeId');
    }
}
