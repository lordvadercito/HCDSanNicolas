<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use Illuminate\Http\Request;

class CommissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $commissions = Commission::all();
        return view('commissions.index', compact('commissions'));
    }

    public function show(Commission $commission)
    {
        return view('commissions.show', compact('commission'));
    }

    public function create()
    {
        return view('commissions.create');
    }

    public function store()
    {
        /**
         *Validacion de datos obtenidos desde el formulario de creacion de comisiones
         * @return boolean
         * @fields: 'name', 'description'
         **/
        $data = request()->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string']
        ], [
            'name.required' => 'Debe ingresar el nombre del bloque',
            'name.string' => 'El nombre del bloque solo puede ser texto',
            'description.required' => 'Debe ingresar la descripcion del bloque',
            'description.string' => 'La descripcion del bloque solo puede ser texto'
        ]);

        try {
            Commission::create([
                'name' => $data['name'],
                'description' => $data['description']
            ]);

        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return redirect('/comisiones');
    }

    public function edit(Commission $commission)
    {
        return view('commissions.edit', ['commission' => $commission]);
    }

    public function update(Commission $commission)
    {
        $data = request()->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string']
        ], [
            'name.required' => 'Debe ingresar el nombre del bloque',
            'name.string' => 'El nombre del bloque solo puede ser texto',
            'description.required' => 'Debe ingresar la descripcion del bloque',
            'description.string' => 'La descripcion del bloque solo puede ser texto'
        ]);

        $commission->update($data);
        return redirect('/comisiones');
    }

    public function delete(Commission $commission)
    {
        $commission->delete();
        return redirect('/comisiones');
    }
}
