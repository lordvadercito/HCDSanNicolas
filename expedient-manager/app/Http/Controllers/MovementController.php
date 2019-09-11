<?php

namespace App\Http\Controllers;

use App\Models\Expedient;
use App\Models\Movement;
use Illuminate\View\View;

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


    public function show(Expedient $expedient)
    {
        $movements = Movement::where('expedient_id', $expedient->id)
            ->get();
        return view('movements.show', compact('movements'));


    }

    private static function getExpedient(Expedient $expedient)
    {
        /**
         * Obtiene el expediente de referencia que se desea mover
         */
        $actual = Movement::where('expedient_id', $expedient->id)
            ->orderBy('id', 'DESC')
            ->take(1)
            ->get();

        return $actual;
    }

    public function create(Expedient $expedient)
    {
        $actual = self::getExpedient($expedient);
        return view('movements.create', compact('expedient', 'actual'));
    }

    public function fastPass(Expedient $expedient)
    {
        /**
         * Crea pases rápidos de expedientes, en los cuales solo se puede elegir si es pase con o sin despacho
         */
        $actual = self::getExpedient($expedient);
        return View('movements.fastPass', compact('expedient', 'actual'));
    }

    public function store()
    {
        /**
         *Validacion de datos obtenidos desde el formulario de creacion de movimientos
         * @field 'expedient_id', 'origin', 'destination', 'movement_nro', 'foja', 'origin_user', 'created_at',
         * 'in_table', 'observation'
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
            'in_table' => ['required', 'boolean'],
            'observation' => ['nullable', 'string'],
            'date' => 'nullable'
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
            'in_table.boolean' => 'Sólo se admiten valores de verdadero o falso',
            'observation.string' => 'El campo observación solo puede albergar texto'
        ]);

        try {
            Movement::create([
                'expedient_id' => $data['expedient_id'],
                'origin' => $data['origin'],
                'destination' => $data['destination'],
                'movement_nro' => $data['movement_nro'],
                'foja' => $data['foja'],
                'origin_user' => $data['origin_user'],
                'in_table' => $data['in_table'],
                'observation' => $data['observation'],
                'date' => $data['data']
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
