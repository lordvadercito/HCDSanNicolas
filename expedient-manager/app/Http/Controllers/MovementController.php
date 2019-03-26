<?php

namespace App\Http\Controllers;

use App\Models\Expedient;
use App\Models\Movement;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

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

    public function create(Request $request)
    {
        return view('movements.create', compact('request'));
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
            'origin_detail' => 'string',
            'destination_detail' => 'string',
            'destination' => ['required'],
            'movementType' => ['required'],
            'origin_user' => ['required', 'numeric']
        ], [
            'expedient_id.required' => 'Debe seleccionar un expediente',
            'expedient_id.numeric' => 'El valor del campo Expediente debe ser numerico',
            'origin.required' => 'Debe seleccionar un origen',
            'origin_detail.string' => 'El detalle debe ser texto',
            'destination.required' => 'Debe seleccionar un destino',
            'destination_detail.string' => 'El detalle debe ser texto',
            'movementType.required' => 'Debe seleccionar el tipo de movimiento',
            'origin_user.required' => 'No pudo comprobarse el usuario que genera el movimiento',
            'origin_user.numeric' => 'El valor de usuario detectado no es numerico'
        ]);

        try {
            Movement::create([
                'expedient_id' => $data['expedient_id'],
                'origin' => $data['origin'],
                'origin_detail' => $data['origin_detail'],
                'destination' => $data['destination'],
                'destination_detail' => $data['destination_detail'],
                'movementType' => $data['movementType'],
                'origin_user' => $data['origin_user'],
            ]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return redirect('/movimientos');
    }
}
