<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TailorsModel extends Model
{
    use SoftDeletes;

protected $table = 'tailors';

    protected $fillable = [
        'name','phone','state','city','district','address','types','status','roles'
    ];


public function roleType(){
    return $this->belongsTo(UsersTypeModel::class, 'roles');
}

public function tailorTypes(){
    return $this->hasMany(TailorType::class, 'tailor_id');
}


}
