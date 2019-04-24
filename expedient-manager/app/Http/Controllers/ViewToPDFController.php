<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Object_;

class ViewToPDFController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __toPDF(Object_ $object)
    {

    }

}
