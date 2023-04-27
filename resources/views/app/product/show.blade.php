@extends('app.layouts.basic')
@section('titulo', 'Visualizar')
@section('content')

    <div class="conteudo-pagina">
        
        <div class="titulo-pagina-2">
            <p>Visualização</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('product.index')}}">Voltar</a></li>
                <li><a href="{{route('')}}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
               <table border="1" style="align-items: left;">
                <tr>
                    <td>ID: </td>
                    <td>{{$produto->id}}</td>
                </tr>
                <tr>
                    <td>Nome: </td>
                    <td>{{$produto->nome}}</td>
                </tr>
                <tr>
                    <td>Descrição: </td>
                    <td>{{$produto->descricao}}</td>
                </tr>
                <tr>
                    <td>Peso: </td>
                    <td>{{$produto->peso}}</td>
                </tr>
                <tr>
                    <td>Unidade de Medida: </td>
                    <td>{{$produto->unidade_id}}</td>
                </tr>
               </table>
            </div>       
        </div>
    </div>

@endsection