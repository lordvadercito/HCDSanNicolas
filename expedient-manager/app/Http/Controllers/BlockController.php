<?php

namespace App\Http\Controllers;

use App\Models\Block;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $blocks = Block::all();
        return view('blocks.index', compact('blocks'));
    }

    public function show(Block $block)
    {
        return view('blocks.show', compact('block'));
    }

    public function create()
    {
        return view('blocks.create');
    }

    public function store()
    {
        /**
         *Validacion de datos obtenidos desde el formulario de creacion de bloques
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
            Block::create([
                'name' => $data['name'],
                'description' => $data['description']
            ]);

        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return redirect('/bloques');
    }

    public function edit(Block $block)
    {
        return view('blocks.edit', ['block' => $block]);
    }

    public function update(Block $block)
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

        $block->update($data);
        return redirect('/bloques');
    }
}
