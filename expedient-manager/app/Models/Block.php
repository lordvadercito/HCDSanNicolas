<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Block extends Model
{
    use SoftDeletes;
    //
    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'description', 'created_at'];

    public function councillor()
    {
        return $this->hasMany(Councillor::class, 'blocks_id', 'id');
    }
}
