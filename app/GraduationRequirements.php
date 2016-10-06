<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GraduationRequirements extends Model
{
    // table proerties
    protected $table = 'graduation_requirements';

    // inverse relation
    public function course()
    {
        return $this->belongsTo('App\Course', 'courseCode', 'courseCode');
    }

    public function type()
    {
        return $this->belongsTo('App\UnitType', 'unitType', 'unitType');
    }
}
