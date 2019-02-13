<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use SoftDeletes;
    //
    protected $dates = ['deleted_at'];

    public function expedient(){
        return $this->hasMany(Expedient::class);
    }
}
