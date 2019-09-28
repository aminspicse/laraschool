<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mst_Auth_backup extends Model
{
    protected $fillable = [
        'user_id','auth_code','deleted_by'
    ];

    protected $table='mst_auth_backups';
}
