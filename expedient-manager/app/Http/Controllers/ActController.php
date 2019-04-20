<?php

namespace App\Http\Controllers;

use App\Models\Act;
use Illuminate\Http\Request;

class ActController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $acts = Act::orderBy('act_date', 'DESC')
            ->paginate(10);

        return view('acts.index', compact('acts'));
    }

    public function show(Act $act)
    {
        return view('acts.show', compact('act'));
    }

    public function create()
    {
        return view('acts.create');
    }

    public function store()
    {
        /**
         *Validacion de datos obtenidos desde el formulario de creacion de actas
         * @return boolean
         * @fields: 'act_nro', 'act_date', 'hcd_president', 'hcd_secretary',
         *          'session_type', 'session_start', 'session_end', 'tribute', 'observation'
         **/
        $data = request()->validate([
            'act_nro' => ['required', 'numeric'],
            'act_date' => ['required', 'Date'],
            'hcd_president' => ['nullable', 'string'],
            'hcd_secretary' => ['nullable', 'string'],
            'session_type' => ['required', 'string'],
            'session_start' => ['nullable', 'Date'],
            'session_end' => ['nullable', 'Date'],
            'tribute' => ['nullable', 'string'],
            'observation' => ['nullable', 'string']
        ], [
            'act_nro.required' => 'Debe ingresar el número de acta',
            'act_nro.numeric' => 'El número de acta debe ser un campo numérico',
            'act_date.required' => 'Debe ingresar la fecha del acta',
            'act_date.Date' => 'El campo debe ser una fecha',
            'hcd_president.string' => 'El nombre del Presidente debe ser un texto',
            'hcd_secretary.string' => 'El nombre del Secretario debe ser un texto',
            'session_type.required' => 'Debe ingresar el tema de la sesión',
            'session_type.string' => 'El tipo de sesión debe ser un texto',
            'session_start.Date' => 'El inicio de sesión debe ser una fecha',
            'session_end.Date' => 'El fin de sesión debe ser una fecha',
            'tribute.string' => 'El homenaje debe ser un texto',
            'observation.string' => 'La observación debe ser un texto'
        ]);

        try {
            Act::create([
                'act_nro' => $data['act_nro'],
                'act_date' => $data['act_date'],
                'hcd_president' => $data['hcd_president'],
                'hcd_secretary' => $data['hcd_secretary'],
                'session_type' => $data['session_type'],
                'session_start' => $data['session_start'],
                'session_end' => $data['session_end'],
                'tribute' => $data['tribute'],
                'observation' => $data['observation']
            ]);

        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return redirect('/actas');
    }
}
