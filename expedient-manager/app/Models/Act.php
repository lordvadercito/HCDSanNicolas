<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Act extends Model
{
    use SoftDeletes;
    //
    protected $dates = ['deleted_at'];

    protected $fillable = ['act_nro', 'act_date', 'hcd_president', 'hcd_secretary', 'session_type', 'session_start', 'session_end', 'tribute', 'observation'];

}
