<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
     protected $fillable = [
        'order_id','item_no','type_id','qty','status',
        'assigned_to','measurements','notes','urgent'
    ];

    protected $casts = [
        'measurements' => 'array'
    ];

   public function order()
{
    return $this->belongsTo(Order::class, 'order_id', 'id');
}

public function tracks()
{
    return $this->hasMany(
        OrderItemTrack::class,
        'order_item_id',
        'id'
    );
}




public function type()
{
    return $this->belongsTo(Types::class, 'type_id');
}
}
