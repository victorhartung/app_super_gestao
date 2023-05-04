@if(isset($pedido->id))
<form method="POST" action="{{route('order.update', ['pedido' => $peddo->id])}}">
    @csrf
    @method('PUT')
@else
<form method="POST" action="{{route('order.store')}}">
    @csrf
@endif
  
<select name="cliente_id">
    <option>Selecione um fornecedor</option>
    @foreach($clientes as $cliente)
        <option value="{{$cliente->id}}" {{ $pedido->cliente_id ?? old('cliente_id') == $cliente->id ? 'selected' : '' }}>{{$cliente->nome}}</option>
    @endforeach
</select>

    {{ $errors->has('cliente_id') ? $errors->first('cliente_id') : '' }}
    
    <button type="submit" class="borda-preta">Adicionar</button>
</form>