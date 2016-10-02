<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamUnit extends Model
{
    protected $connection = 'eduversal';

    protected $table = 'exam_units';

    protected $fillable = [
        'studentID',
        'unitCode',
        'grade'
    ];
}
