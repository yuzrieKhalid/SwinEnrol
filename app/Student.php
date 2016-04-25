<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $table = 'student';


    protected $fillable = [
        'id', 'stdID', 'stdName', 'courseLevel', 'course'
    ];


}
