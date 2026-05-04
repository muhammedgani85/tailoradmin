<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_no','customer_id','phone','order_date','status','created_by'
    ];

    public function items(){
        return $this->hasMany(OrderItem::class);
    }

    public function images(){
        return $this->hasMany(OrderImage::class);
    }

}
