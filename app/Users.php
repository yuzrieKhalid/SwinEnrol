<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';

    // primary key
	protected $primaryKey = 'username';
	public $incrementing = false;
}
