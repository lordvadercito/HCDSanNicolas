<?php

namespace App\Http\Controllers;

use App\Models\Expedient;
use Illuminate\Http\Request;

class ExpedientController extends Controller
{
    public function create()
    {
        return view('expedients.create');
    }

    public function store(Request $request){
        $expedient = new Expedient();
        $expedient->create($request->all());
        return "Hecho";
    }
}