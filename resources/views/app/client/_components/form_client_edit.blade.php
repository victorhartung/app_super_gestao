@if(isset($cliente->id))
<form method="POST" action="{{route('product.update', ['cliente' => $cliente->id])}}">
    @csrf
    @method('PUT')
@else
<form method="POST" action="{{route('client.store')}}">
    @csrf
@endif
  
    <input type ="text" name="nome" value="{{ $cliente->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
    
    <button type="submit" class="borda-preta">Adicionar</button>
</form>