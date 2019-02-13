<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expedient extends Model
{
   use SoftDeletes;
    //
    protected $dates = ['deleted_at'];

    protected $fillable = ['expedientNro','projectType','subject','cover','state_id','archived','incomeRecord','treatmentRecord'];

    public function state(){
        return $this->belongsTo(State::class);
    }
}