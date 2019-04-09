<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expedient extends Model
{
    use SoftDeletes;
    //
    protected $dates = ['deleted_at'];

    protected $fillable = ['id', 'expedientNro', 'expedientDENro', 'projectType', 'subject', 'secondary_subject', 'cover', 'origin', 'commission_id', 'state', 'archived', 'incomeRecord', 'treatmentRecord', 'user_id', 'creted_at', 'creation_date'];

    public function annexes()
    {
        return $this->belongsToMany(Annex::class);
    }

    public function movements()
    {
        return $this->hasOne(Movement::class, 'expedient_id', 'id');
    }

    public function commissions()
    {
        return $this->belongsTo(Commission::class, 'commission_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeExpedientNro($query, $expedientNro)
    {
        /**
         * Este metodo realiza la busqueda por numero de expediente
         */
        if (trim($expedientNro) != "") {
            $query->where('expedientNro', $expedientNro);
        }
    }

    public function scopeCreationDate($query, $creationDate)
    {
        /**
         * Este metodo realiza la busqueda por fecha de creacion
         */
        if ($creationDate != "") {
            $query->where('creation_date', $creationDate);
        }
    }
}
