<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use SoftDeletes;
    //
    protected $dates = ['deleted_at'];

    protected $fillable = ['id', 'nro', 'type', 'direction', 'creation_date', 'origin', 'description', 'expedient_id', 'user_id'];

    public function expedients()
    {
        return $this->belongsTo(Expedient::class, 'expedient_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
