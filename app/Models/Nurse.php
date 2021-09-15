<?php

namespace App\Models;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Nurse extends Authenticatable
{
    use HasApiTokens , SoftDeletes;
   
    protected $fillable = ['name','user_name','password'];

        protected $hidden = [
            'password', 'user_id' , "created_at" , 'updated_at' ,'deleted_at'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
