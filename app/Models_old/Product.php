<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
class Product extends Model
{
     use SoftDeletes;
     protected $fillable = ['id', 'name', 'description', 'price',
     'quantity','discount_ratio','image','image2','image3', 'vendor_id', 'category_id'];
     protected $hidden = [
        'user_id' , "created_at" , 'updated_at' ,'deleted_at'
    ];
    public function getImageAttribute()
    {

        if($this->attributes['image'] != null && !file_exists(asset($this->attributes['image'])) ){
            return asset($this->attributes['image']);
        }
        else
        {
            return asset('assets/img/avatars/avatar-1.jpg');
        }
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function choices()
    {
        return $this->hasMany(ProductChoice::class , 'product_id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
    // public function isFavourite()
    // {
    //     return $this->Favourite == null ? 0 : 1;
    // }
    public function isFavourite()
    {
        return $this->hasOne(WishList::class , 'product_id')->where('client_id' , Auth::guard('client-api')->user()->id);
    }
    public function vendorDiscount()
    {
        return $this->belongsTo(Vendor::class , 'vendor_id')->select(['id','client_ratio','client_vip_ratio']);
    }
}
