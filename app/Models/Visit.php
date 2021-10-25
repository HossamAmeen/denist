<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
     use SoftDeletes;
     protected $fillable = ['date' ,'time','piad','status','doctor_id', 'patient_id','nurse_id'];
     protected $hidden = [
         'user_id',"created_at" , 'updated_at','deleted_at' 
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function patient(){
        return $this->belongsTo(Patient::class)->select(['id','name','phone']);;
    }
    public function doctor(){
        return $this->belongsTo(Doctor::class)->select(['id','name']);;
    }
    public function nurse(){
        return $this->belongsTo(Nurse::class)->select(['id','name']);;
    }
    public function operations(){
        return $this->hasMany(TeethOperation::class , 'visit_id')->select(['id','visit_id','operation','cost']);
    }
    public function totalCost(){
        return $this->hasMany(TeethOperation::class , 'visit_id');
    }
}
