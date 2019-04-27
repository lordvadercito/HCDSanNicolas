<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Councillor;
use Illuminate\Http\Request;

class CouncillorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $councillors = Councillor::all();
        return view('councillors.index', compact('councillors'));
    }

    public function show(Councillor $councillor)
    {
        return view('councillors.show', compact('councillor'));
    }

    public function create()
    {
        return view('councillors.create');
    }

    public function store()
    {
        /**
         *Validacion de datos obtenidos desde el formulario de creacion de concejales
         * @return boolean
         * @fields: 'name', 'surname', 'blocks_id', 'commissions_id', 'start_of_mandate', 'end_of_mandate', 'active'
         **/
        $data = request()->validate([
            'name' => ['required', 'string'],
            'surname' => ['required', 'string'],
            'blocks_id' => ['required', 'numeric'],
            'commissions_id' => ['required', 'numeric'],
            'start_of_mandate' => ['required', 'date'],
            'end_of_mandate' => 'date',
            'active' => ['required', 'boolean']
        ], [
            'name.required' => 'Debe ingresar el nombre del concejal',
            'name.string' => 'El nombre del concejal solo puede ser texto',
            'surname.required' => 'Debe ingresar el apellido del concejal',
            'surname.string' => 'El apellido del concejal solo puede ser texto',
            'blocks_id.required' => 'Debe ingresar el bloque de concejales al que pertenece',
            'blocks_id.numeric' => 'El id del bloque debe ser numerico',
            'commissions_id.required' => 'Debe ingresar la comision de concejales a la que pertenece',
            'commissions_id.numeric' => 'El id del comision debe ser numerico',
            'start_of_mandate.required' => 'Debe ingresar la fecha de inicio del mandato',
            'start_of_mandate.date' => 'La fecha de inicio debe estar en formato FECHA(DD/MM/AAAA)',
            'end_of_mandate.date' => 'La fecha de fin debe estar en formato FECHA(DD/MM/AAAA)',
            'active.required' => 'Debe indicar si el concejal esta activo',
            'active.boolean' => 'El valor de "Activo" debe ser booleano'
        ]);


        try {
            Councillor::create([
                'name' => $data['name'],
                'surname' => $data['surname'],
                'blocks_id' => $data['blocks_id'],
                'commissions_id' => $data['commissions_id'],
                'start_of_mandate' => $data['start_of_mandate'],
                'end_of_mandate' => $data['end_of_mandate'],
                'active' => $data['active']
            ]);

        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return redirect('/concejales');
    }

    public function edit(Councillor $councillor)
    {
        return view('councillors.edit', ['councillor' => $councillor]);
    }

    public function update(Councillor $councillor)
    {

        $data = request()->validate([
            'name' => ['required', 'string'],
            'surname' => ['required', 'string'],
            'blocks_id' => ['required', 'numeric'],
            'commissions_id' => ['required', 'numeric'],
            'start_of_mandate' => ['required', 'date'],
            'end_of_mandate' => 'date',
            'active' => ['required', 'boolean']
        ], [
            'name.required' => 'Debe ingresar el nombre del concejal',
            'name.string' => 'El nombre del concejal solo puede ser texto',
            'surname.required' => 'Debe ingresar el apellido del concejal',
            'surname.string' => 'El apellido del concejal solo puede ser texto',
            'blocks_id.required' => 'Debe ingresar el bloque de concejales al que pertenece',
            'blocks_id.numeric' => 'El id del bloque debe ser numerico',
            'commissions_id.required' => 'Debe ingresar la comision de concejales a la que pertenece',
            'commissions_id.numeric' => 'El id del comision debe ser numerico',
            'start_of_mandate.required' => 'Debe ingresar la fecha de inicio del mandato',
            'start_of_mandate.date' => 'La fecha de inicio debe estar en formato FECHA(DD/MM/AAAA)',
            'end_of_mandate.date' => 'La fecha de fin debe estar en formato FECHA(DD/MM/AAAA)',
            'active.required' => 'Debe indicar si el concejal esta activo',
            'active.boolean' => 'El valor de "Activo" debe ser booleano'
        ]);

        $councillor->update($data);
        return redirect('/concejales');
    }

    public function delete(Councillor $councillor)
    {
        $councillor->delete();
        return redirect('/concejales');
    }
}
