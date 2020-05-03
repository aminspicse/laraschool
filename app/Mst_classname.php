<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mst_classname extends Model
{
    protected $fillable = ['user_id','auth_code','lib_cls_id','gpa_outof','remarks'];
}
