<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
     use SoftDeletes;
     protected $fillable = ['question','answer'];
     protected $hidden = [
         'user_id',"created_at" , 'updated_at'  ,'deleted_at'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
