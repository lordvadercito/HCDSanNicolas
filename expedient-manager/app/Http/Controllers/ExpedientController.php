<?php

namespace App\Http\Controllers;

use App\Models\Annex;
use App\Models\Expedient;
use App\Models\Movement;
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
        $position = Movement::where('expedient_id', $expedient->id)
            ->orderBy('id', 'desc')
            ->take(1)
            ->get();
        return view('expedients.show', compact('expedient', 'position'));
    }

    public function create()
    {
        return view('expedients.create');
    }

    public function store()
    {
        /**
         *Validacion de datos obtenidos desde el formulario de creacion de expedientes
         * El campo Estado (state) guarda por defecto el valor "Pendiente". Las validaciones
         * no fueron removidas a fin de evitar manipulaciones maliciosas desde el Front-end
         * @return boolean
         **/
        $data = request()->validate([
            'expedientNro' => ['required', 'numeric', 'unique:expedients,expedientNro'],
            'expedientDENro' => ['nullable', 'string'],
            'projectType' => 'required',
            'subject' => 'required',
            'secondary_subject' => ['nullable', 'string'],
            'cover' => 'required',
            'origin' => 'required',
            'commission_id' => ['required', 'numeric'],
            'incomeRecord' => 'required',
            'treatmentRecord' => 'nullable',
            'creation_date' => ['required', 'date'],
            'user_id' => ['required', 'numeric']
        ], [
            'expedientNro.required' => 'Debe ingresar un número de expediente',
            'expedientNro.numeric' => 'El número de expediente debe ser un valor numérico',
            'expedientNro.unique' => 'Ya existe un expediente con ese número',
            'expedientDENro.string' => 'El numero de expediente debe tener el formato "Nro Expediente/Año"',
            'projectType.required' => 'Debe ingresar el tipo de proyecto del expediente',
            'subject.required' => 'Debe ingresar un asunto para el expediente',
            'secondary_subject.string' => 'El tema secundario debe ser un campo de texto',
            'cover.required' => 'Debe ingresar una carátula para el expediente',
            'origin' => 'Debe especificar el origen del expediente',
            'commission_id.required' => 'Debe ingresar la comisión de destino',
            'commission_id.numeric' => 'El campo comisión de destino debe ser numérico',
            'incomeRecord.required' => 'Debe ingresar el acta ingreso',
            'creation_date.required' => 'Debe ingresar la fecha de creación del expediente',
            'creation_date.date' => 'El valor ingresado no es una fecha válida',
            'user_id.required' => 'Falta ingresar el id del usuario que generó el expediente',
            'user_id.numeric' => 'El id de usuario debe ser numérico'
        ]);


        try {
            $expedient = Expedient::create([
                'expedientNro' => $data['expedientNro'],
                'expedientDENro' => $data['expedientDENro'],
                'projectType' => $data['projectType'],
                'subject' => $data['subject'],
                'secondary_subject' => $data['secondary_subject'],
                'cover' => $data['cover'],
                'origin' => $data['origin'],
                'commission_id' => $data['commission_id'],
                'state' => 'Pendiente',
                'archived' => 0,
                'incomeRecord' => $data['incomeRecord'],
                'treatmentRecord' => $data['treatmentRecord'],
                'creation_date' => $data['creation_date'],
                'user_id' => $data['user_id']
            ]);

        } catch (Exception $e) {
            echo $e->getMessage();
        }

        if (!is_null($expedient)) {

            Movement::create([
                'expedient_id' => $expedient->id,
                'origin' => $expedient->origin,
                'destination' => 'Secretaría',
                'movement_nro' => 1,
                'foja' => 0,
                'in_table' => 0,
                'origin_user' => $expedient->user_id
            ]);
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
            'expedientDENro' => ['nullable', 'string'],
            'projectType' => 'required',
            'subject' => 'required',
            'secondary_subject' => ['nullable', 'string'],
            'cover' => 'required',
            'origin' => 'required',
            'commission_id' => ['required', 'numeric'],
            'archived' => 'required',
            'incomeRecord' => 'required',
            'treatmentRecord' => 'nullable',
            'creation_date' => ['required', 'date'],
            'user_id' => ['required', 'numeric']
        ], [
            'expedientNro.required' => 'Debe ingresar un número de expediente',
            'expedientNro.numeric' => 'El número de expediente debe ser un valor numérico',
            'expedientDENro.string' => 'El numero de expediente debe tener el formato "Nro Expediente/Año"',
            'projectType.required' => 'Debe ingresar el tipo de proyecto del expediente',
            'subject.required' => 'Debe ingresar un asunto para el expediente',
            'secondary_subject.string' => 'El tema secundario debe ser un campo de texto',
            'cover.required' => 'Debe ingresar una carátula para el expediente',
            'origin' => 'Debe especificar el origen del expediente',
            'commission_id.required' => 'Debe ingresar la comisión de destino',
            'commission_id.numeric' => 'El campo comisión de destino debe ser numérico',
            'incomeRecord.required' => 'Debe ingresar el acta ingreso',
            'creation_date.required' => 'Debe ingresar la fecha de creación del expediente',
            'creation_date.date' => 'El valor ingresado no es una fecha válida',
            'user_id.required' => 'Falta ingresar el id del usuario que generó el expediente',
            'user_id.numeric' => 'El id de usuario debe ser numérico'
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
        $annexes = Expedient::all();
        return view('expedients.annexes', array('annexes' => $annexes, 'expedient' => $expedient));
    }

    public function attachAnnex(Expedient $annex, Expedient $expedient)
    {
        /**
         * Este metodo asigna un anexo a un expediente
         * @param Annex $annex : El anexo que se quiere asignar
         * @param Expedient $expedient : El expediente al que se le quiere asignar el anexo
         * @return Cierra automáticamente la ventana emergente
         */


        try {
            $expedient->annexes()->attach($annex->id);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return "<script>window.close();</script>";

    }

    public function detachAnnex(Expedient $annex, Expedient $expedient)
    {
        /**
         * Este metodo desvincula un anexo de un expediente
         * @param Annex $annex : El anexo que se quiere desvincular
         * @param Expedient $expedient : El expediente al que se le quiere desvincular el anexo
         * @return Cierra recarga la pagina
         */


        try {
            $expedient->annexes()->detach($annex->id);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return redirect('/expedientes');
    }
}
