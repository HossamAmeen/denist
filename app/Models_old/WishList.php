<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WishList extends Model
{
     use SoftDeletes;
     protected $fillable = ['client_id' , 'product_id'];
     protected $hidden = [
         'user_id',"created_at" , 'updated_at' ,'deleted_at'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class , 'product_id')->select(['id' , 'name' , 'description' , 'price' ,'rating','vendor_id','discount_ratio', 'image']);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
