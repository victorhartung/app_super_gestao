<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact () {
        
        $motivo_contatos = [
            '1' => 'Dúvida',
            '2' => 'Elogio',
            '3' => 'Reclamação'
        ];

        return view ('site.contact', ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);

    }

    public function save (Request $request) {

    }
}
