<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItemTrack extends Model
{
        protected $fillable = [
        'order_item_id','stage_id','status',
        'assigned_to','started_at','completed_at','remarks'
    ];

    public function item(){
        return $this->belongsTo(OrderItem::class,'order_item_id');
    }

}
