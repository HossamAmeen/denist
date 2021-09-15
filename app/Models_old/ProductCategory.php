<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
     use SoftDeletes;
     protected $fillable = ['name' , 'vendor_id'];
     protected $hidden = [
        'is_hidden','user_id' , "created_at" , 'updated_at' ,'deleted_at'
    ];
    function products()
    {
        return $this->hasMany(Product::class , "category_id")->where('quantity' , '>' , 0);
    }

}
