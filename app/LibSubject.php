<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LibSubject extends Model
{
    protected $fillable = [
        'subject_code','subject_name'
    ];

    //protected $table='lib_subjects';
}
