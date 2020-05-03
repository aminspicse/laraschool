<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result_subject extends Model
{
    protected $fillable=[
        'student_id','class_id','semester_id','department_id',
        'auth_code','user_id','incourse','mcq','cq','total','subject_id',
        'gpa','grade','year_name'
    ];
}
