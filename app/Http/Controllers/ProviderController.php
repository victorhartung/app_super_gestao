<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class ProviderController extends Controller
{
    public function index() {
       
        return view('app.provider.index');
    
    }

    public function list(Request $request) {

        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
            ->where('nome', 'like', '%'.$request->input('site').'%')
            ->where('nome', 'like', '%'.$request->input('uf').'%')
            ->where('nome', 'like', '%'.$request->input('email').'%')
            ->get();

        return view('app.provider.list', ['fornecedores' => $fornecedores]);

    }

    public function add(Request $request) {

        $msg = '';

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

            $msg = 'Cadastro Realizado com sucesso!';
        
        }

        return view('app.provider.add', ['msg' => $msg]);

    }

    public function edit($id) {
        
        $fornecedor = Fornecedor::find($id);

        return view('app.provider.add', ['fornecedor' => $fornecedor]);
    
    }
}
