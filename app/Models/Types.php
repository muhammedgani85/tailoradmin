<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Types extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'type',
        'status',
        'description',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
