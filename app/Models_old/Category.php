<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
     use SoftDeletes;
     protected $fillable = ['name' , 'user_id'];
     protected $hidden = [
        'user_id' , "created_at" , 'updated_at' ,'deleted_at'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
