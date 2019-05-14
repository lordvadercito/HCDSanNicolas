<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class BudgetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $budgets = Budget::orderBY('created_at', 'DESC')
            ->paginate(10);

        return view('budgets.index', compact('budgets'));
    }

    public function show(Budget $budget)
    {
        return view('budgets.show', compact('budget'));
    }

    public function create()
    {
        return View('budgets.create');
    }

    public function store(Request $request)
    {
        /**
         *Validacion de datos obtenidos desde el formulario de subida de pdf
         * @return boolean
         * @fields: 'file_name', 'file_path', 'user_id'
         **/
        if ($request->hasFile('pdf_file') && ($request->file('pdf_file')->extension('pdf'))) {
            $file = $request->file('pdf_file');
            $file_name = $file->getClientOriginalName();
            \Storage::disk('local')->put($file_name, \File::get($file));

        } else {
            $file_name = null;
        }

        $data = request()->validate([
            'pdf_file' => ['required', 'mimes:pdf'],
            'file_path' => 'nullable',
            'user_id' => 'required'
        ], [
            'pdf_file.required' => 'Debe seleccionar un archivo',
            'pdf_file.mimes' => 'El tipo de archivo seleccionado no es válido',
            'user_id.required' => 'Error al obtener el usuario de subida del archivo'
        ]);
        try {
            Budget::create([
                'file_name' => $file_name,
                'file_path' => public_path() . '/storage/' . $file_name,
                'user_id' => $data['user_id'],
            ]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return redirect('/presupuestos');
    }

    public function delete(Budget $budget)
    {
        $budget->delete();
        return redirect('/presupuestos');
    }

}
