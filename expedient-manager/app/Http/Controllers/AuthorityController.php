<?php

namespace App\Http\Controllers;

use App\Models\Authority;
use Illuminate\Http\Request;

class AuthorityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        return view('authorities.edit');
    }

    public function update(Authority $authority)
    {
        /**
         * Validación de datos obtenidos desde el formulario de actualización de autoridades
         * @fields 'position', 'name', 'surname'
         */

        $data = request()->validate([
            'name' => ['nullable', 'string'],
            'surname' => ['nullable', 'string']
        ], [
            'name.string' => 'El nombre debe ser un texto',
            'surname.string' => 'El apellido debe ser un texto'
        ]);

        $authority->update($data);
        return redirect('/expedientes');
    }
}
