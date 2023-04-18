<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MotivoContato;

class MainController extends Controller
{
    public function main () {

        $motivo_contatos = MotivoContato::all();
         
        return view('site.main', ['motivo_contatos' => $motivo_contatos]);

    }
}
