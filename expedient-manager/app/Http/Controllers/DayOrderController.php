<?php

namespace App\Http\Controllers;

use App\Models\Councillor;
use App\Models\DayOrder;
use App\Models\Expedient;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DayOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $day_orders = DayOrder::orderBy('dateOrder', 'DESC')
            ->paginate(10);

        return view('dayOrders.index', compact('day_orders'));
    }

    public function show(DayOrder $dayOrder)
    {
        return view('dayOrders.show', compact('dayOrder'));
    }

    public function create()
    {
        return view('dayOrders.create');
    }

    public function store()
    {
        /**
         *Validacion de datos obtenidos desde el formulario de creacion de órdenes del día
         * @return boolean
         * @fields: 'act_id', 'dateOrder', 'sessionNro', 'lock'
         **/
        $data = request()->validate([
            'act_id' => ['required', 'numeric'],
            'dateOrder' => ['required', 'date'],
            'sessionNro' => ['required', 'numeric'],
        ], [
            'act_id.required' => 'Debe ingresar el número de acta',
            'act_id.numeric' => 'El número de acta debe ser un valor numérico',
            'dateOrder.required' => 'Debe ingresar la fecha del Orden del Día',
            'dateOrder.date' => 'El campo fecha del orden debe ser una fecha',
            'sessionNro.required' => 'Debe ingresar el número de sesión',
            'sessionNro.numeric' => 'Debe ser un valor numérico',
        ]);
        try {
            $dayOrder = DayOrder::create([
                'act_id' => $data['act_id'],
                'dateOrder' => $data['dateOrder'],
                'sessionNro' => $data['sessionNro'],
                'lock' => 0
            ]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return redirect()->action('DayOrderController@annex', ['dayOrder' => $dayOrder]);
    }

    public function annex(DayOrder $dayOrder)
    {
        $informs_in = Note::where('type', 'I')
            ->where('direction', 'E')
            ->orderBy('creation_date', 'DESC')
            ->get();

        $informs_out = Note::where('type', 'I')
            ->where('direction', 'S')
            ->orderBy('creation_date', 'DESC')
            ->get();

        $notes_in = Note::where('type', 'N')
            ->where('direction', 'E')
            ->orderBy('creation_date', 'DESC')
            ->get();

        $notes_out = Note::where('type', 'N')
            ->where('direction', 'S')
            ->orderBy('creation_date', 'DESC')
            ->get();

        $expedients = Expedient::whereNotIn('state', array('Aprobado por mayoría', 'Aprobado por unanimidad', 'Rechazado por mayoría',
            'Rechazado por unanimidad'))->get();

        return view('dayOrders.annex', compact('dayOrder', 'informs_in', 'informs_out', 'notes_in', 'notes_out', 'expedients'));
    }

    public function attached(Request $request)
    {
        $dayOrder = DayOrder::find($request['dayOrderId']);

        $dayOrder->expedients()->attach($request['expedients']);

        $dayOrder->notes()->attach($request['informsIn']);

        $dayOrder->notes()->attach($request['informsOut']);

        $dayOrder->notes()->attach($request['notesIn']);

        $dayOrder->notes()->attach($request['notesOut']);

        return redirect('/orden');
    }

    public function edit(DayOrder $dayOrder)
    {
        return view('dayOrders.edit', ['dayOrder' => $dayOrder]);
    }

    public function update(DayOrder $dayOrder)
    {

        $data = request()->validate([
            'act_id' => ['required', 'numeric'],
            'dateOrder' => ['required', 'date'],
            'sessionNro' => ['required', 'numeric'],
            'lock' => ['required', 'boolean']
        ], [
            'act_id.required' => 'Debe ingresar el número de acta',
            'act_id.numeric' => 'El número de acta debe ser un valor numérico',
            'dateOrder.required' => 'Debe ingresar la fecha del Orden del Día',
            'dateOrder.date' => 'El campo fecha del orden debe ser una fecha',
            'sessionNro.required' => 'Debe ingresar el número de sesión',
            'sessionNro.numeric' => 'Debe ser un valor numérico',
            'lock.required' => 'Debe indicar si el order del día está activo',
            'lock.boolean' => 'El campo debe ser booleano'
        ]);

        $dayOrder->update($data);
        return redirect('/orden');
    }

    public function delete(DayOrder $dayOrder)
    {
        $dayOrder->delete();
        return redirect('/orden');
    }

    public function viewPdf(DayOrder $dayOrder)
    {
        $view = \View::make('dayOrders.show', compact('dayOrder'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('show.pdf');
    }

    public function downloadPdf(DayOrder $dayOrder)
    {
        $view = \View::make('dayOrders.show', compact('dayOrder'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->download('Orden_del_dia.pdf');
    }
}
