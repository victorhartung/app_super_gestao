@extends('app.layouts.basic')
@section('titulo', 'Produtos')
@section('content')

    <div class="conteudo-pagina">
        
        <div class="titulo-pagina-2">
            @if(isset($produto->id))
            <p>Editar produto</p>
            @else
            <p>Adicionar produto</p>
            @endif
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('product.index')}}">Voltar</a></li>
                <li><a href="{{route('')}}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
               @component('app.product._components.form_create_edit')
                   
               @endcomponent
            </div>       
        </div>
    </div>

@endsection