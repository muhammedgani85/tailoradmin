<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TailorType extends Model
{
    protected $table = 'tailor_types';

    protected $fillable = [
        'tailor_id','type_id'
    ];
}
