<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Complaint extends Model
{
    use SoftDeletes;
    protected $fillable = ['complaint','phone','name'];
    protected $hidden = [
        'user_id',"created_at" , 'updated_at' ,'deleted_at'
   ];
   public function user(){
       return $this->belongsTo(User::class);
   }
}
