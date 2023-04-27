<?php

namespace App\Http\Controllers;

use App\Models\Unidade;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) //exibir lista de registros
    {
        $produtos = Produto::paginate(10);

        return view('app.product.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)  //exibir formulário de criação de registro
    {
        $unidades = Unidade::all();

        return view('app.produto.create', ['unidade' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //receber formulário de criação do registro
    {

        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidade,id',
            //'unidade_id' => 'exists:<tabela>,<coluna>',
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'descricao.min' => 'O campo descrição deve ter no mínimo 3 caracteres',
            'descricao.max' => 'O campo descrição deve ter no máximo 2000 caracteres',
            'peso.integer' => 'O campo peso deve ser um número inteiro',
            'unidade_id' => 'A unidade de medida informada não existe'
        ];

        $request->validate($regras, $feedback);

        Produto::create($request->all());

        // $produto = new Produto();

        // $nome = $request->get('nome');
        // $descricao = $request->get('descricao');
        // $nome = strtoupper($request->get('nome'));

        // $produto->nome = $nome;
        // $produto->descricao = $descricao;
        // $produto->save();

        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto) //exibir registro específico 
    {
        return view('app.product.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto) // exibir formulário de edição do registro
    {
        $unidades = Unidade::all();
        return view('app.product.edit', ['produto' => $produto->id, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto) // receber formulário de criação do registro
    {

        $produto->update($request->all());

        return redirect()->route('product.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto) // receber dados de remoção do registro
    {
        $produto->delete();
     
        return redirect()->route('product.index', ['produto' => $produto->id]);
    }
}
