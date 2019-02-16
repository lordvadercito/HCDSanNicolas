<?php

namespace App\Http\Controllers;

use App\Models\Expedient;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class ExpedientController extends Controller
{
    public function create()
    {
        return view('expedients.create');
    }

    public function store(Request $request)
    {
        /**
         *Validacion de datos obtenidos desde el formulario de creacion de expedientes
         * @return boolean
         **/
        $data = request()->validate([
            'expedientNro' => ['required', 'numeric', 'unique:expedients,expedientNro'],
            'projectType' => 'required',
            'subject' => 'required',
            'cover' => 'required',
            'state' => 'required',
            'archived' => 'required',
            'incomeRecord' => 'required',
            'treatmentRecord' => 'required'
        ]);


        try {
            Expedient::create([
                'expedientNro' => $data['expedientNro'],
                'projectType' => $data['projectType'],
                'subject' => $data['subject'],
                'cover' => $data['cover'],
                'state' => $data['state'],
                'archived' => $data['archived'],
                'incomeRecord' => $data['incomeRecord'],
                'treatmentRecord' => $data['treatmentRecord'],
            ]);

        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return "Hecho";
    }
}