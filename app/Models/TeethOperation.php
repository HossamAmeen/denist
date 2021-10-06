<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TeethOperation extends Model
{
     use SoftDeletes;
     protected $fillable = ['operation', 'cost' , 'patient_id','visit_id' , 'teeth_id'];
     protected $hidden = [
         'user_id',"created_at" , 'updated_at','deleted_at' 
    ];
    public function operation(){
        return $this->belongsTo(Operation::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
