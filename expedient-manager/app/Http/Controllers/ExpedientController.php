<?php

namespace App\Http\Controllers;

use App\Models\Annex;
use App\Models\Expedient;
use Illuminate\Http\Request;
use Illuminate\View\View;
use mysql_xdevapi\Exception;


class ExpedientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $expedients = Expedient::expedientNro($request->get('expedientNro'))
            ->creationDate($request->get('creation_date'))
            ->orderBy('creation_date', 'DESC')
            ->paginate(10);
        return view('expedients.index', compact('expedients'));

    }

    public function show(Expedient $expedient)
    {
        return view('expedients.show', compact('expedient'));
    }

    public function create()
    {
        return view('expedients.create');
    }

    public function store()
    {
        /**
         *Validacion de datos obtenidos desde el formulario de creacion de expedientes
         * @return boolean
         **/
        $data = request()->validate([
            'expedientNro' => ['required', 'numeric', 'unique:expedients,expedientNro'],
            'expedientDENro' => 'required',
            'projectType' => 'required',
            'subject' => 'required',
            'secondary_subject' => 'string',
            'cover' => 'required',
            'origin' => 'required',
            'state' => 'required',
            'archived' => 'required',
            'incomeRecord' => 'required',
            'treatmentRecord' => 'required',
            'creation_date' => ['required', 'date']
        ], [
            'expedientNro.required' => 'Debe ingresar un número de expediente',
            'expedientNro.numeric' => 'El número de expediente debe ser un valor numérico',
            'expedientNro.unique' => 'Ya existe un expediente con ese número',
            'expedientDENro.required' => 'Debe ingresar el número de expediente del Departamento Ejecutivo',
            'projectType.required' => 'Debe ingresar el tipo de proyecto del expediente',
            'subject.required' => 'Debe ingresar un asunto para el expediente',
            'secondary_subject.string' => 'El tema secundario debe ser un campo de texto',
            'cover.required' => 'Debe ingresar una carátula para el expediente',
            'origin' => 'Debe especificar el origen del expediente',
            'incomeRecord.required' => 'Debe ingresar el acta ingreso',
            'treatmentRecord.required' => 'Debe ingresar el acta de tratamiento',
            'creation_date.required' => 'Debe ingresar la fecha de creación del expediente',
            'creation_date.date' => 'El valor ingresado no es una fecha válida'
        ]);


        try {
            Expedient::create([
                'expedientNro' => $data['expedientNro'],
                'expedientDENro' => $data['expedientDENro'],
                'projectType' => $data['projectType'],
                'subject' => $data['subject'],
                'secondary_subject' => $data['secondary_subject'],
                'cover' => $data['cover'],
                'origin' => $data['origin'],
                'state' => $data['state'],
                'archived' => $data['archived'],
                'incomeRecord' => $data['incomeRecord'],
                'treatmentRecord' => $data['treatmentRecord'],
                'creation_date' => $data['creation_date'],
            ]);

        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return redirect('/expedientes');
    }

    public function edit(Expedient $expedient)
    {
        return view('expedients.edit', ['expedient' => $expedient]);
    }

    public function update(Expedient $expedient)
    {
        $data = request()->validate([
            'expedientNro' => ['required', 'numeric'],
            'expedientDENro' => 'required',
            'projectType' => 'required',
            'subject' => 'required',
            'secondary_subject' => 'string',
            'cover' => 'required',
            'origin' => 'required',
            'state' => 'required',
            'archived' => 'required',
            'incomeRecord' => 'required',
            'treatmentRecord' => 'required',
            'creation_date' => ['required', 'date']
        ], [
            'expedientNro.required' => 'Debe ingresar un número de expediente',
            'expedientNro.numeric' => 'El número de expediente debe ser un valor numérico',
            'expedientDENro.required' => 'Debe ingresar el número de expediente del Departamento Ejecutivo',
            'projectType.required' => 'Debe ingresar el tipo de proyecto del expediente',
            'subject.required' => 'Debe ingresar un asunto para el expediente',
            'secondary_subject.string' => 'El tema secundario debe ser un campo de texto',
            'cover.required' => 'Debe ingresar una carátula para el expediente',
            'origin' => 'Debe especificar el origen del expediente',
            'incomeRecord.required' => 'Debe ingresar el acta ingreso',
            'treatmentRecord.required' => 'Debe ingresar el acta de tratamiento',
            'creation_date.required' => 'Debe ingresar la fecha de creación del expediente',
            'creation_date.date' => 'El valor ingresado no es una fecha válida'
        ]);

        $expedient->update($data);
        return redirect('/expedientes');
    }

    public function loadAttachAnnexForm(Expedient $expedient)
    {
        /**
         * Este metodo carga el formulario para asignar anexos
         * a los expedientes
         */
        $annexes = Annex::all();
        return view('expedients.annexes', array('annexes' => $annexes, 'expedient' => $expedient));
    }

    public function attachAnnex(Annex $annex, Expedient $expedient)
    {
        /**
         * Este metodo asigna un anexo a un expediente
         * @param Annex $annex : El anexo que se quiere asignar
         * @param Expedient $expedient : El expediente al que se le quiere asignar el anexo
         * @return boolean
         */

        try {
            $expedient->annexes()->attach($annex->id);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return "<script>window.close();</script>";

    }
}
