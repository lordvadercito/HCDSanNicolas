<?php

namespace App\Http\Controllers;

use App\Models\Annex;
use Illuminate\Http\Request;

class AnnexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $annexes = Annex::all();

        return view('annexes.index', compact('annexes'));
    }

    public function show(Annex $annex)
    {
        return view('annexes.show', compact('annex'));
    }

    public function create()
    {
        return view('annexes.create');
    }

    public function store(Request $request)
    {
        /**
         *Validacion de datos obtenidos desde el formulario de creacion de expedientes
         * @return boolean
         **/
        $data = request()->validate([
            'nroAnnex' => ['required', 'numeric', 'unique:annexes,nroAnnex'],
            'title' => 'required',
            'type' => 'required',
            'content' => 'required',
        ], [
            'nroAnnex.required' => 'Debe ingresar un número de anexo',
            'nroAnnex.numeric' => 'El número de anexo debe ser un valor numérico',
            'nroAnnex.unique' => 'Ya existe un anexo con ese número',
            'title.required' => 'Debe ingresar el título del anexo',
            'type.required' => 'Debe ingresar el tipo de anexo',
            'content.required' => 'Debe ingresar el contenido del anexo',
        ]);


        try {
            Annex::create([
                'nroAnnex' => $data['nroAnnex'],
                'title' => $data['title'],
                'type' => $data['type'],
                'content' => $data['content']
            ]);

        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return redirect('/anexos');
    }

    public function edit(Annex $annex)
    {

        return view('annexes.edit', ['annex' => $annex]);
    }

    public function update(Annex $annex)
    {
        $data = request()->validate([
            'nroAnnex' => ['required', 'numeric'],
            'title' => 'required',
            'type' => 'required',
            'content' => 'required',
        ], [
            'nroAnnex.required' => 'Debe ingresar un número de anexo',
            'nroAnnex.numeric' => 'El número de anexo debe ser un valor numérico',
            'title.required' => 'Debe ingresar el título del anexo',
            'type.required' => 'Debe ingresar el tipo de anexo',
            'content.required' => 'Debe ingresar el contenido del anexo',
        ]);

        $annex->update($data);
        return redirect('/anexos');
    }


}
