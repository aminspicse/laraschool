<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mst_setting extends Model
{
    protected $fillable = [
        'user_id',
        'auth_code',
        'class_id',
        'department_id',
        'semester_id',
        'year_name'
    ];

    public function getclass()
    {
        
    }
}
