<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VendorCategory extends Model
{
     use SoftDeletes;
     protected $fillable = ['vendor_id' , 'category_id'];
     protected $hidden = [
         'user_id',"created_at" , 'updated_at' 
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
