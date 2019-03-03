<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }

    public function show(Department $department)
    {
        return view('departments.show', compact('department'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'unique'],
            'external' => ['required', 'boolean'],
            'departmentType' => ['required', 'string']
        ], [
            'name.required' => 'Debe ingresar el nombre del departamento',
            'name.string' => 'El campo "Nombre del departamento" solo puede ser un texto',
            'name.unique' => 'Ya existe un departamento con el mismo nombre',
            'external.required' => 'Debe indicar si el departamento es interno o externo',
            'external.boolean' => 'El campo "Externo" solo admite valores de "Si" o "No"',
            'departmentType.required' => 'Debe ingresar el tipo de departamento',
            'departmentType.string' => 'El campo "Tipo del departamento" solo puede ser un texto'
        ]);

        try {
            Department::create([
                'name' => $data['name'],
                'external' => $data['external'],
                'departmentType' => $data['departmentType']
            ]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return redirect('/departamentos');
    }

    public function edit(Department $department)
    {
        return view('departments.edit', ['department' => $department]);
    }

    public function update(Department $department)
    {
        $data = request()->validate([
            'name' => ['required', 'string'],
            'external' => ['required', 'boolean'],
            'departmentType' => ['required', 'string']
        ], [
            'name.required' => 'Debe ingresar el nombre del departamento',
            'name.string' => 'El campo "Nombre del departamento" solo puede ser un texto',
            'external.required' => 'Debe indicar si el departamento es interno o externo',
            'external.boolean' => 'El campo "Externo" solo admite valores de "Si" o "No"',
            'departmentType.required' => 'Debe ingresar el tipo de departamento',
            'departmentType.string' => 'El campo "Tipo del departamento" solo puede ser un texto'
        ]);

        $department->update($data);
        return redirect('/departamentos');

    }

}
