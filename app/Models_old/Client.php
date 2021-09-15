<?php

namespace App\Models;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Client extends Authenticatable
{
    use HasApiTokens , Notifiable , SoftDeletes;
     protected $fillable = [
        'first_name','last_name', 'gender', 'email', 'password', 'status', 'phone','google_id' , 'facebook_id', 'rating' ,'image','user_id'
     ];
     protected $hidden = [
       'password', 'user_id' , "created_at" , 'updated_at' ,'deleted_at'
    ];
    public function getFullNameAttribute()
    {
        return $this->attributes['first_name'] .' '. $this->attributes['last_name'] ;
    }
    public function getImageAttribute()
    {

        if($this->attributes['image'] != null  ){
            return ($this->attributes['image']);
        }
        else
        {
            return asset('assets/img/avatars/avatar-1.jpg');
        }
    }
    public function addresses()
    {
        return $this->hasMany(ClientAddress::class , 'client_id')->orderBy('id')->limit(1);
    }
    public function favouriteAddress()
    {
        return $this->hasOne(ClientAddress::class , 'client_id')->where('is_favourite' , 1 );
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function scopeAccepted($query)
    {
        return $query->where('approvement', 'accept');
    }
    public function orderItem()
    {
        return $this->hasMany(OrderItem::class , 'client_id')->orderBy('id');
    }
}
