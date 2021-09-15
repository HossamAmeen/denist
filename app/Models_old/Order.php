<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
     use SoftDeletes;
    //  protected $fillable = ['price','discount','discount_ratio','is_vip', 'status', 'quantity','vendor_benefit','vendor_id','product_id', 'client_id','cart_id'];
     protected $fillable = ['date','time','price','delivery_cost','discount_ratio','is_vip','isWithDelivery','total_discount','vendor_benefit', 'status','refuse_reason','client_address_id','vendor_id', 'client_id','cart_id'];
     protected $hidden = [
        'user_id' , "created_at" , 'updated_at' ,'deleted_at'
    ];
   public function address()
   {
    return $this->belongsTo(ClientAddress::class , 'client_address_id')->select(['id','address','first_name','phone']);

   }

    public function items()
    {
        return $this->hasMany(OrderItem::class , 'order_id')->where('status', 'pending from client');
    }
    // public function totalDiscount()
    // {
    //     return $this->hasMany(OrderItem::class , 'order_id')->sum('discount');
    // }
    public function itemsSent()
    {
        return $this->hasMany(OrderItem::class , 'order_id')
        ->select(['id','product_id' , 'discount_ratio' ,'discount', 'price' ,'choice_price','over_quantity','quantity','order_id']);

    }
    public function client(){
        return $this->belongsTo(Client::class)->select(['id','first_name','last_name', ]);
    }
}
