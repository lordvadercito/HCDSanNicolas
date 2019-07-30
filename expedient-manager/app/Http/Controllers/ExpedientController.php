<?php

namespace App\Http\Controllers;

use App\Models\Act;
use App\Models\Annex;
use App\Models\Expedient;
use App\Models\Movement;
use Illuminate\Http\Request;
use Illuminate\View\View;
use mysql_xdevapi\Exception;


class ExpedientController extends Controller
{
    /**
     * @fields: 'id', 'expedientNro', 'expedientDENro', 'projectType', 'subject', 'secondary_subject', 'cover',
     * 'origin', 'commission_id', 'state', 'archived', 'incomeRecord', 'treatmentRecord', 'user_id', 'creted_at',
     * 'creation_date', 'ordinanceNro', 'resolutionNro', 'excerpt', 'recommendation', 'file_annex_name', 'file_annex_path'
     */

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
            'projectType' => 'required',
            'subject' => 'required',
            'cover' => 'nullable',
            'origin' => 'required',
            'incomeRecord' => 'required',
            'commission_id' => ['required', 'numeric'],
            'expedientDENro' => 'nullable',
            'creation_date' => ['required', 'date'],
            'user_id' => ['required', 'numeric']
        ], [
            'expedientNro.required' => 'Debe ingresar un número de expediente',
            'expedientNro.numeric' => 'El número de expediente debe ser un valor numérico',
            'expedientNro.unique' => 'Ya existe un expediente con ese número',
            'projectType.required' => 'Debe ingresar el tipo de proyecto del expediente',
            'subject.required' => 'Debe ingresar un asunto para el expediente',
            'origin' => 'Debe especificar el origen del expediente',
            'incomeRecord' => 'Error al cargar el registro de ingreso',
            'commission_id.required' => 'Debe ingresar la comisión de destino',
            'commission_id.numeric' => 'El campo comisión de destino debe ser numérico',
            'creation_date.required' => 'Debe ingresar la fecha de creación del expediente',
            'creation_date.date' => 'El valor ingresado no es una fecha válida',
            'user_id.required' => 'Falta ingresar el id del usuario que generó el expediente',
            'user_id.numeric' => 'El id de usuario debe ser numérico'
        ]);


        try {
            $expedient = Expedient::create([
                'expedientNro' => $data['expedientNro'],
                'projectType' => $data['projectType'],
                'subject' => $data['subject'],
                'cover' => $data['cover'] != null ? $data['cover'] : 'Ingrese una carátula',
                'origin' => $data['origin'],
                'incomeRecord' => $data['incomeRecord'],
                'commission_id' => $data['commission_id'],
                'state' => 'Pendiente',
                'archived' => 0,
                'expedientDENro' => $data['expedientDENro'],
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

        /**
         *Validacion de datos obtenidos desde el formulario de subida de pdf
         * @return boolean
         * @fields: 'file_annex_name', 'file_annex_path'
         **/
        $request = request();
        if ($request->hasFile('pdf_file') && ($request->file('pdf_file')->extension('pdf'))) {
            $file = $request->file('pdf_file');
            $file_name = $file->getClientOriginalName();
            \Storage::disk('local')->put($file_name, \File::get($file));

        } else {
            $file_name = null;
        }


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
            'user_id' => ['required', 'numeric'],
            'ordinanceNro' => 'nullable',
            'resolutionNro' => 'nullable',
            'excerpt' => 'nullable',
            'recommendation' => 'nullable',
            'file_annex_name' => ['nullable', 'mimes:pdf'],
            'file_annex_path' => 'nullable'

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

        $data['file_annex_name'] = $file_name;
        $data['file_annex_path'] = public_path() . '/storage/' . $file_name;

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

    public function viewPdf(Expedient $expedient)
    {
        $view = \View::make('expedients.pdf', compact('expedient'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('expediente-' . $expedient->expedientNro . '.pdf');
    }

    public function search()
    {
        return view('expedients.search');
    }

    public function results(Request $request)
    {
        $expedient = Expedient::where('expedientNro', $request->expedientNro)
            ->take(100)
            ->get();
        return view('expedients.results', compact('expedient'));

    }
}
