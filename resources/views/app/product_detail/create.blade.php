@extends('app.layouts.basic')
@section('titulo', 'Detalhes do produto')
@section('content')

    <div class="conteudo-pagina">   
        <div class="titulo-pagina-2">       
            <p>Adicionar deltalhes do produto</p>      
        </div>
        <div class="menu">
            <ul>
                <li><a href="#">Voltar</a></li>
    
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
               @component('app.product_detalhe._components.form_create_edit', ['unidades' => $unidades])
                   
               @endcomponent
            </div>       
        </div>
    </div>
@endsection