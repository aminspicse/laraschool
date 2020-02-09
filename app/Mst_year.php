<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mst_year extends Model
{
    protected $fillable = ['auth_code','user_id','year_name','remarks'];
}
