<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expedient extends Model
{
    use SoftDeletes;
    //
    protected $dates = ['deleted_at'];

    protected $fillable = ['id','expedientNro', 'projectType', 'subject', 'cover', 'state', 'archived', 'incomeRecord', 'treatmentRecord'];

    public function annexes()
    {
        return $this->belongsToMany(Annex::class);
    }
}