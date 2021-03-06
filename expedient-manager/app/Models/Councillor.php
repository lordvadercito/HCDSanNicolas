<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Councillor extends Model
{
    use SoftDeletes;
    //
    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'surname', 'blocks_id', 'commissions_id', 'start_of_mandate', 'end_of_mandate', 'active'];

    public function block()
    {
        return $this->belongsTo(Block::class, 'blocks_id');
    }

    public function commission()
    {
        return $this->belongsTo(Commission::class, 'commissions_id');
    }
}
