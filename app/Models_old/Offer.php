<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
     use SoftDeletes;
     protected $fillable = ['user_id','image'];
     protected $hidden = [
         'user_id',"created_at" , 'updated_at'  ,'deleted_at'
    ];
    public function getImageAttribute()
    {
        
        if($this->attributes['image'] != null  ){
            return asset($this->attributes['image']);
            // return ($this->attributes['image']);
        }
        else
        {
            return asset('assets/img/avatars/avatar-1.jpg');
        }
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
