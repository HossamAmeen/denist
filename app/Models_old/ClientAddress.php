<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientAddress extends Model
{
     use SoftDeletes;
     protected   $fillable = ['address', 'first_name',  'last_name', 'phone' ,'city','is_favourite', 'client_id'];
     protected $hidden = [
         'user_id',"created_at" , 'updated_at' ,'deleted_at'
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
