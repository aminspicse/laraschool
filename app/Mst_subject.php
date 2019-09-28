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
        'subject_name',
        'subject_code',
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
        'description',
        
        'updated_by'
    ];
}
