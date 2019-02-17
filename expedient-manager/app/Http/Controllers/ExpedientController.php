<?php

namespace App\Http\Controllers;

use App\Models\Expedient;
use Illuminate\Http\Request;
use Illuminate\View\View;
use mysql_xdevapi\Exception;

class ExpedientController extends Controller
{
    public function index(){
        $expedients = Expedient::all();

    }

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
        ],[
            'expedientNro.required' => 'Debe ingresar un número de expediente',
            'expedientNro.numeric' => 'El número de expediente debe ser un valor numérico',
            'expedientNro.unique' => 'Ya existe un expediente con ese número',
            'projectType.required' => 'Debe ingresar el tipo de proyecto del expediente',
            'subject.required' => 'Debe ingresar un asunto para el expediente',
            'cover.required' => 'Debe ingresar una carátula para el expediente',
            'incomeRecord.required' => 'Debe ingresar el acta ingreso',
            'treatmentRecord.required' => 'Debe ingresar el acta de tratamiento'
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