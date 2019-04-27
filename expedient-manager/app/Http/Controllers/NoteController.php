<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\View\View;
use mysql_xdevapi\Exception;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $notes = Note::orderBy('creation_date', 'DESC')
            ->paginate(10);

        return View('notes.index', compact('notes'));
    }

    public function show(Note $note)
    {
        return View('notes.show', compact('note'));
    }

    public function create()
    {
        return View('notes.create');
    }

    public function edit(Note $note)
    {
        return View('notes.edit', ['note' => $note]);
    }

    public function store()
    {
        /**
         *Validacion de datos obtenidos desde el formulario de creacion de notas e informes
         * @fields 'nro', 'type', 'direction', 'creation_date', 'origin', 'description', 'expedient_id', 'user_id'
         * @return boolean
         **/
        $data = request()->validate([
            'nro' => ['required', 'numeric'],
            'type' => 'required',
            'direction' => ['required', 'string'],
            'creation_date' => ['required', 'date'],
            'origin' => ['required', 'string'],
            'description' => 'required',
            'expedient_id' => ['required', 'numeric'],
            'user_id' => ['required', 'numeric']
        ], [
            'nro.required' => 'Debe ingresar el número de nota o informe',
            'nro.numeric' => 'Debe ser un valor numérico',
            'type.required' => 'Debe elegir un tipo de documento (Nota o Informe)',
            'direction.required' => 'Debe indicar la dirección del documento',
            'direction.string' => 'Debe ser un campo de texto',
            'creation_date.required' => 'Debe indicar la fecha de creación',
            'creation_date.date' => 'El campo debe contener una fecha',
            'origin.required' => 'Debe indicar el origen del documento',
            'origin.string' => 'El origen debe ser un campo de texto',
            'description.required' => 'Debe ingresar la descripción del documento',
            'expedient_id.required' => 'Debe indicar el expediente al que vinculará este documento',
            'expedient_id.numeric' => 'Debe ser un valor numérico',
            'user_id.required' => 'Ocurrió un error al guardar el usuario de creación',
            'user_id.numeric' => 'Ocurrió un error al guardar el usuario de creación (ID no numérico)'
        ]);

        try {
            Note::create([
                'nro' => $data['nro'],
                'type' => $data['type'],
                'direction' => $data['direction'],
                'creation_date' => $data['creation_date'],
                'origin' => $data['origin'],
                'description' => $data['description'],
                'expedient_id' => $data['expedient_id'],
                'user_id' => $data['user_id']
            ]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return redirect('/notas');
    }

    public function update(Note $note)
    {
        $data = request()->validate([
            'nro' => ['required', 'numeric'],
            'type' => 'required',
            'direction' => ['required', 'string'],
            'creation_date' => ['required', 'date'],
            'origin' => ['required', 'string'],
            'description' => 'required',
            'expedient_id' => ['required', 'numeric'],
            'user_id' => ['required', 'numeric']
        ], [
            'nro.required' => 'Debe ingresar el número de nota o informe',
            'nro.numeric' => 'Debe ser un valor numérico',
            'type.required' => 'Debe elegir un tipo de documento (Nota o Informe)',
            'direction.required' => 'Debe indicar la dirección del documento',
            'direction.string' => 'Debe ser un campo de texto',
            'creation_date.required' => 'Debe indicar la fecha de creación',
            'creation_date.date' => 'El campo debe contener una fecha',
            'origin.required' => 'Debe indicar el origen del documento',
            'origin.string' => 'El origen debe ser un campo de texto',
            'description.required' => 'Debe ingresar la descripción del documento',
            'expedient_id.required' => 'Debe indicar el expediente al que vinculará este documento',
            'expedient_id.numeric' => 'Debe ser un valor numérico',
            'user_id.required' => 'Ocurrió un error al guardar el usuario de creación',
            'user_id.numeric' => 'Ocurrió un error al guardar el usuario de creación (ID no numérico)'
        ]);

        $note->update($data);
        return redirect('/notas');
    }

    public function delete(Note $note)
    {
        $note->delete();
        return redirect('/notas');
    }
}
