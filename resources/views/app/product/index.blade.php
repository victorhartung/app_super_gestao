@extends('app.layouts.basic')
@section('titulo', 'Produto')
@section('content')

    <div class="conteudo-pagina">
        
        <div class="titulo-pagina-2">
            <p>Produtos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('product.create')}}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">           
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peso</th>
                            <th>Unidade ID</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produtos as $produto)
                        <tr>
                            <td>{{$produto->nome}}</td>
                            <td>{{$produto->descricao}}</td>
                            <td>{{$produto->peso}}</td>
                            <td>{{$produto->unidade_id}}</td>
                            <td><a href="">Excluir</a></td>
                            <td><a href="">Editar</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>  
                {{ $produtos->appends($request)->links() }} 
                <br>
                {{ $produtos->count() }} - Total de registros por página   
                <br>
                {{ $produtos->total() }} - Total de registros por consulta
                <br>
                {{ $produtos->firstItem() }} - Número do primeiro registro da página
                <br>
                {{ $produtos->lastItem() }} - Número do último registro da página
                
            </div>       
        </div>
    </div>

@endsection