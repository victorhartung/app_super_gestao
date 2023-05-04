@extends('app.layouts.basic')
@section('titulo', 'Pedido')
@section('content')

    <div class="conteudo-pagina">
        
        <div class="titulo-pagina-2">
            <p>Listagem de Pedidos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('order.create')}}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">           
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID Pedido</th>
                            <th>Cliente</th>
                            <th><a href="{{route('order-product.create', ['pedido' => $pedido->id])}}">Adicionar Produtos</a></th>
                            <th><a href="{{route('order.show', ['pedido' => $pedido->id])}}"></a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pedidos as $pedido)
                        <tr>
                            
                            <td>{{ $pedido->id }}</td>
                            <td>{{ $pedido->cliente_id }}</td>
                            <td><a href="{{ route('order.show', ['pedido' => $pedido->id]) }}">Visualizar</a></td>
                            
                                <td>
                                    <form method="post" id="form_{{$pedido->id}}" action="{{route('order.destroy', ['pedido' => $pedido->id])}}">
                                        @csrf
                                        @method('DELETE')
                                        {{-- <button type="submit">Excluir</button> --}}
                                        <a href="#" onclick="document.getElementbyId('form_{{$pedido->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            
                            <td><a href="{{ route('order.edit', ['pedido' => $pedido->id]) }}">Editar</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>  
                {{ $pedidos->appends($request)->links() }} 
                <br>
                {{ $pedidos->count() }} - Total de registros por página   
                <br>
                {{ $pedidos->total() }} - Total de registros por consulta
                <br>
                {{ $pedidos->firstItem() }} - Número do primeiro registro da página
                <br>
                {{ $pedidos->lastItem() }} - Número do último registro da página
                
            </div>       
        </div>
    </div>

@endsection