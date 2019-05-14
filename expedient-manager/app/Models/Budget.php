<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Budget extends Model
{
    use SoftDeletes;
    //
    protected $dates = ['deleted_at'];

    protected $fillable = ['file_name', 'file_path', 'user_id', 'created_at'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
