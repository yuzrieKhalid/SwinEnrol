<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentRecord extends Model
{
    protected $connection = 'eduversal';

    protected $table = 'student_records';

    protected $fillable = [
        'studentID',
        'surname',
        'givenName',
        'email',
        'courseCode',
        'paymentStatus'
    ];
}
