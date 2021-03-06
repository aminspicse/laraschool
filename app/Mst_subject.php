<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mst_subject extends Model
{
    // mst_subjects table  
    protected $fillable = [
        'auth_code',
        'user_id',
        'class_id',
        'department_id',
        //'subject_name',
        //'subject_code',
        'lib_sub_id',
        'incourse',
        'incourse_pass',
        'mcq',
        'mcq_pass',
        'cq',
        'cq_pass',
        'pt',
        'pt_pass',
        'total',
        'total_pass',
        'mark_system',
        'subject_type',
        'descriptions',
        
        'updated_by'
    ];
}
