<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tailors extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name','age','phone','state','city','district','address','types','status'
    ];
}
