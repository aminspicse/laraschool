<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentRegistration extends Model
{
   protected $fillable = [
        'student_id',
        'class_id',
        'semester_id',
        'year_id',
        'user_id',
        'registration_date',
        'user_id',
        'auth_code'
    ];

    protected $table = 'studentregistrations';
}
