<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auth_backup extends Model
{
    protected $fillable = [
        'user_id','auth_code','deleted_by'
    ];
}
