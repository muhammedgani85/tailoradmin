<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class stage extends Model
{
    protected $fillable = ['name','order_id'];
    protected $table = 'stages';

    public function orderItemTracks(){
        return $this->hasMany(OrderItemTrack::class,'stage_id');
    }
}
