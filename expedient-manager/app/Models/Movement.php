<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movement extends Model
{
    use SoftDeletes;
    //
    protected $dates = ['deleted_at'];

    protected $fillable = ['expedient_id', 'origin', 'destination', 'movementType', 'origin_user', 'created_at'];

    public function expedients()
    {
        return $this->belongsTo(Expedient::class, 'expedient_id');

    }

    public function users()
    {
        return $this->belongsTo(User::class, 'origin_user');
    }
}
