<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContactController extends Controller
{
    public function contact () {
        
        $motivo_contatos = MotivoContato::all();

  
        return view ('site.contact', ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);

    }

    public function save (Request $request) {
        
        // $request->vadidate([
        //     'nome' => 'required|min:3|max:40',
        //     'telefone' => 'required',
        //     'email' => 'email',
        //     'motivo_contato' => 'required',
        //     'mensagem' => 'required|max:2000'
        // ],
        // [
        //     'nome.required' => 'O nome precisa ser preenchido',
        //     'telefone.required' => 'O telefone precisa ser preenchido',
        //     'email.email' => 'O email precisa ser preenchido',
        //     'motivo_contato.required' => 'O motivo precisa ser preenchido',
        //     'mensagem.required' => 'A mensagem precisar ser preenchida', //:atributte para mais dinamismo 
        // ]);

        $regras = [
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedback = [
            'nome.required' => 'O nome precisa ser preenchido',
             'telefone.required' => 'O telefone precisa ser preenchido',
             'email.email' => 'O email precisa ser preenchido',
             'motivo_contato.required' => 'O motivo precisa ser preenchido',
             'mensagem.required' => 'A mensagem precisar ser preenchida', //:atributte para mais dinamismo 
        ];

        $request->validate($regras, $feedback);
        SiteContato::create($request->all());
        return redirect()->route('site.main');

    }
}
