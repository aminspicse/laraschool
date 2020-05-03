<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LibClass extends Model
{
    protected $fillable = [
        'lib_cls_id','class_name'
    ];

    protected $table='lib_class';
}
