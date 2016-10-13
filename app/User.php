<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'permissionLevel', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // relation
    public function coordinator_units()
    {
        return $this->hasMany('App\CoordinatorUnits', 'username');
    }

    public function course_coordinator()
    {
        return $this->hasMany('App\CourseCoordinator', 'username');
    }
}
