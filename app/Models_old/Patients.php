<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
     use SoftDeletes;
     protected $hidden = [
         'user_id',"created_at" , 'updated_at','deleted_at' 
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}