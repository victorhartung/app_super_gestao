<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class ProviderController extends Controller
{
    public function index() {
       
        return view('app.provider.index');
    
    }

    public function list() {

        return view('app.provider.list');

    }

    public function add(Request $request) {

        if($request->input('_token') != '') {
            
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O nome deve ter no minimo 3 caracteres',
                'nome.max' => 'O nome dev ter no máximo 40 caracteres',
                'uf.min' => 'O nome deve ter no minimo 2 caracteres',
                'uf.max' => 'O nome dev ter no máximo 2 caracteres',
                'email.email' => 'O campo e-mail não foi preenchido corretamente'
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());
        
        }

        return view('app.provider.add');

    }
}
