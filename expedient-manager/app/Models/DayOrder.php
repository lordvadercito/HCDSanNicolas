<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DayOrder extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = ['id', 'act_id', 'dateOrder', 'sessionNro', 'lock'];

    public function acts()
    {
        return $this->belongsTo(Act::class, 'act_id');
    }

    public function expedients()
    {
        return $this->belongsToMany(Expedient::class, 'day_order_expedients', 'day_order_id', 'expedient_id');
    }

    public function notes()
    {
        return $this->belongsToMany(Note::class, 'day_order__notes', 'day_order_id', 'note_id');
    }
}
