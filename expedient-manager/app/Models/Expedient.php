<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expedient extends Model
{
   use SoftDeletes;
    //
    protected $dates = ['deleted_at'];

    public function state(){
        return $this->belongsTo(State::class);
    }
}
