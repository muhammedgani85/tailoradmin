<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_no','customer_id','phone','order_date','status','created_by', 'delivery_date'
    ];

    public function items(){
        return $this->hasMany(OrderItem::class);
    }

    public function images(){
        return $this->hasMany(OrderImage::class);
    }
    public function customer()
{
    return $this->belongsTo(Customer::class);
}
public function stage()
{
    return $this->belongsTo(Stage::class, 'stage_id');
}

}
