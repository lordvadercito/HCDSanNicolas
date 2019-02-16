<?php

namespace App\Http\Controllers;

use App\Models\Expedient;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class ExpedientController extends Controller
{
    public function create()
    {
        return view('expedients.create');
    }

    public function store(Request $request){
        $data = request()->validate([
            'expedientNro' => 'required'
        ]);
        $expedient = new Expedient();
        //$result = true;
        if ($data){
            try{
                $expedient->create($request->all());

            }
            catch(Exception $e){
                echo $e->getMessage();
            }
        }else{
            return false;
        }

        return "Hecho";
    }
}