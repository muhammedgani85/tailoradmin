<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    protected $table ='measurements';
    protected $fillable = [

        'type_id',

        'field_name',

        'display_name',

        'status'
    ];

    public function type()
    {
        return $this->belongsTo(Types::class);
    }
}
