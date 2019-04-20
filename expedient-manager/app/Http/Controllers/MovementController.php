<?php

namespace App\Http\Controllers;

use App\Models\Expedient;
use App\Models\Movement;

class MovementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $movements = Movement::orderBy('created_at', 'DESC')
            ->paginate(10);
        return view('movements.index', compact('movements'));
    }


    public function show(Movement $movement)
    {
        return view('movements.show', compact('movement'));
    }

    public function create(Expedient $expedient)
    {
        /**
         * Obtiene el expediente de referencia que se desea mover
         */
        $actual = Movement::where('expedient_id', $expedient->id)
            ->orderBy('id', 'DESC')
            ->take(1)
            ->get();
        return view('movements.create', compact('expedient', 'actual'));
    }

    public function store()
    {
        /**
         *Validacion de datos obtenidos desde el formulario de creacion de movimientos
         * @field 'expedient_id', 'origin', 'destination', 'movement_nro', 'foja', 'origin_user', 'created_at'
         * @return boolean
         **/
        $data = request()->validate([
            'expedient_id' => ['required', 'numeric'],
            'origin' => ['required'],
            'destination' => ['required'],
            'movement_nro' => ['numeric', 'required'],
            'foja' => ['numeric', 'required'],
            'origin_user' => ['required', 'numeric'],
            'state' => ['required'],
            'in_table' => ['required', 'boolean']
        ], [
            'expedient_id.required' => 'Debe seleccionar un expediente',
            'expedient_id.numeric' => 'El valor del campo Expediente debe ser numerico',
            'origin.required' => 'Debe seleccionar un origen',
            'destination.required' => 'Debe seleccionar un destino',
            'movement_nro.numeric' => 'El campo debe ser numérico',
            'movement_nro.required' => 'Debe seleccionar el número de movimiento',
            'foja.numeric' => 'El campo Foja debe ser numérico',
            'foja.required' => 'Debe ingresar el número de foja',
            'origin_user.required' => 'No pudo comprobarse el usuario que genera el movimiento',
            'origin_user.numeric' => 'El valor de usuario detectado no es numerico',
            'state.required' => 'Debe indicar el estado del expediente',
            'in_table.required' => 'Debe indicar si el expediente está en tabla',
            'in_table.boolean' => 'Sólo se admiten valores de verdadero o falso'
        ]);

        try {
            Movement::create([
                'expedient_id' => $data['expedient_id'],
                'origin' => $data['origin'],
                'destination' => $data['destination'],
                'movement_nro' => $data['movement_nro'],
                'foja' => $data['foja'],
                'origin_user' => $data['origin_user'],
                'in_table' => $data['in_table']
            ]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        /**
         * Este bloque de código realiza la actualización del estado del expediente
         * que se mueve, previa validación
         */
        if (!is_null($data['expedient_id'])) {
            $expedient = Expedient::find($data['expedient_id']);
            $expedient->update(['state' => $data['state']]);
        }

        return redirect('/movimientos');
    }
}
