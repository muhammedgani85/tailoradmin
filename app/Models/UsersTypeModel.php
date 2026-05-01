<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersTypeModel extends Model
{
  public function tailors(){
    return $this->hasMany(TailorsModel::class, 'roles');
}
}
