<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movement extends Model
{
    use SoftDeletes;
    //
    protected $dates = ['deleted_at'];

    protected $fillable = ['expedient_id', 'origin', 'destination', 'movementType', 'origin_user'];

    public function expedients()
    {
        return $this->hasOne(Expedient::class);
    }

    public function users()
    {
        return $this->hasOne(User::class);
    }
}
