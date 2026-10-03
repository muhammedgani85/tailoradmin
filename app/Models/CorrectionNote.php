<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CorrectionNote extends Model
{
    use SoftDeletes;

    protected $table = 'correction_notes';

    protected $fillable = [
        'type_id',
        'description',
    ];

    public function type()
    {
        return $this->belongsTo(Types::class, 'type_id', 'id');
    }
}
