<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
     use SoftDeletes;
     protected $fillable = ['name' ,'age','phone', 'national_id','address','wallet','nurse_id','medical_history'];
     protected $hidden = [
         'user_id',"created_at" , 'updated_at','deleted_at' 
    ];
    public function teeths(){
        return $this->hasMany(Teeth::class , 'patient_id');
    }
    public function visits(){
        return $this->hasMany(Visit::class , 'patient_id')->orderBy('date','DESC')->limit(10);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
