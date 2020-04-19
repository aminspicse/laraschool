<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mst_classname extends Model
{
    protected $fillable = ['user_id','auth_code','class_name','gpa_outof','remarks'];
}
