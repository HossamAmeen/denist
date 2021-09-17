<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
     use SoftDeletes;
     protected $fillable = ['date' ,'time','doctor_id', 'patient_id','nurse_id'];
     protected $hidden = [
         'user_id',"created_at" , 'updated_at','deleted_at' 
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function patient(){
        return $this->belongsTo(Patient::class);
    }
}
