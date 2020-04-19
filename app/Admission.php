<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    //
    protected $fillable=[
        'serial_no',
        'auth_code',
        'student_id',
        'student_name',
        'father_name',
        'mother_name',
        'mobile_number',
        'nationality',
        'nid',
        'dateofbirth',
        'religion',
        'quota',
        'admission_date',
        'country',
        'division',
        'district',
        'upazila',
        'union_id',
        'post_office',
        'permanent_address',
        'previous_education',
        'admission_class',
        'department',
        'admission_year',
        'student_photo',
        'user_id'
    ];
}
