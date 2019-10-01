<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable=[
        'student_id','class_id','semester_id',
        'auth_code','user_id','mcq','cq','total','subject_id',
        'gpa','grade','year_id'
    ];
}
