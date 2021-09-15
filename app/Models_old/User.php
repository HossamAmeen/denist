<?php

namespace App\Models;
use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens , Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   

    protected $fillable = ['user_name', 'name', 'password' ,'phone', 'email', 'role', 'image' ,'user_id'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function getImageAttribute()
    {
        
        if($this->attributes['image'] != null && file_exists(($this->attributes['image'])) ){
            return asset($this->attributes['image']);
        }
        else
        {
            return asset('assets/img/avatars/avatar-1.jpg');
        }
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function AauthAcessToken(){
        return $this->hasMany(OauthAccessToken::class);
    }
}
