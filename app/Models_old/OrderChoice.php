<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderChoice extends Model
{
     use SoftDeletes;
     protected $fillable =['type' ,'name', 'price','quantity','group_name', 'order_item_id'];
     protected $hidden = [
         "created_at" , 'updated_at' ,'deleted_at'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
