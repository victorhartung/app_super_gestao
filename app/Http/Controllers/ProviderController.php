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
            ->paginate(2);

        return view('app.provider.list', ['fornecedores' => $fornecedores, 'request' => $request->all()]);

    }

    public function add(Request $request) {

        $msg = '';

        if($request->input('_token') != '' && $request->input('id') == '') {
            
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O nome deve ter no minimo 3 caracteres',
                'nome.max' => 'O nome deve ter no máximo 40 caracteres',
                'uf.min' => 'O nome deve ter no minimo 2 caracteres',
                'uf.max' => 'O nome deve ter no máximo 2 caracteres',
                'email.email' => 'O campo e-mail não foi preenchido corretamente'
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'Cadastro Realizado com sucesso!';
            
            
        }

        if($request->input('_token') != '' && $request->input('id') == '') {

            $fornecedor = Fornecedor::find($request->input('id'));
            
            $update = $fornecedor->update($request->all());

            if($update) {
            
                $msg = 'Atualização realizada com sucesso!';
            
            }else{ 
                
                $msg = 'Tente novamente';
            
            }

            return redirect()->route('app.provider.edit', ['id' => $request->input('id'), 'msg' => $msg]);
        }

        

        return view('app.provider.add', ['msg' => $msg]);
    
    }

    public function edit($id, $msg = '') {
        
        $fornecedor = Fornecedor::find($id);

        return view('app.provider.add', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    
    }

    public function delete($id) {
        
        Fornecedor::find($id)->delete();
        Fornecedor::find($id)->forceDelete();

        return redirect()->route('app.fornecedor');
    }
}
