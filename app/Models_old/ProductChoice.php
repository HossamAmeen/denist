<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductChoice extends Model
{
     use SoftDeletes;
     protected $fillable = ['name' ,'price', 'type' ,'group_name', 'product_id'];
     protected $hidden = [
         "created_at" , 'updated_at' 
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
