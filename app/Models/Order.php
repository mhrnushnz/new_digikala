<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function paymentMethod(){
        return $this->hasMany(Product::class);
    }


    public function deliveryMethod(){
        return $this->belongsTo(DeliveryMethod::class);
    }


    public function address(){
        return $this->belongsTo(Address::class);
    }


    public function products(){
        return $this->belongsTo(PeymentMethod::class);
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }
}
