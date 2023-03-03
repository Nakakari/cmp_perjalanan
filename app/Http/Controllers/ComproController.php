<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComproController extends Controller
{
    public function compro(){
        return view('Compro.v_compro');
    }

    public function comptrack()
    {
        return view('Compro.v_tracking');
    }
}
