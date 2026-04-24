<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workflow extends Model
{
     use SoftDeletes;

    protected $table = 'workflows';

    protected $fillable = [
        'order_id',
        'name',
        'status',
        'description',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
