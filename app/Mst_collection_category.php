<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mst_collection_category extends Model
{
   protected $fillable = ['category_name','description','user_id','category_status','auth_code'];

   
   protected $table = 'mst_collection_categorys'; 
}
