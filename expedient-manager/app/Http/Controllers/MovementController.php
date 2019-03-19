<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use Illuminate\Http\Request;

class MovementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $movements = Movement::all();
        return view('movements.index', compact('movements'));
    }

    public function create()
    {
        return view('movements.create');
    }

    public function store()
    {
        /**
         *Validacion de datos obtenidos desde el formulario de creacion de movimientos
         * @return boolean
         **/
        $data = request()->validate([
            'expedient_id' => ['required', 'numeric'],
            'origin' => ['required'],
            'destination' => ['required'],
            'movementType' => ['required'],
            'origin_user' => ['required', 'numeric']
        ], [
            'expedient_id.required' => 'Debe seleccionar un expediente',
            'expedient_id.numeric' => 'El valor del campo Expediente debe ser numerico',
            'origin.required' => 'Debe seleccionar un origen',
            'destination.required' => 'Debe seleccionar un destino',
            'movementType.required' => 'Debe seleccionar el tipo de movimiento',
            'origin_user.required' => 'No pudo comprobarse el usuario que genera el movimiento',
            'origin_user.numeric' => 'El valor de usuario detectado no es numerico'
        ]);

        try {
            Movement::create([
                'expedient_id' => $data['expedient_id'],
                'origin' => $data['origin'],
                'destination' => $data['destination'],
                'movementType' => $data['movementType'],
                'origin_user' => $data['origin_user']
            ]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return redirect('/movimientos');
    }
}
