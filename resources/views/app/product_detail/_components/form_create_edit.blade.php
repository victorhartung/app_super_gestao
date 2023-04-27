@if(isset($produto_detalhe->id))
<form method="POST" action="{{route('product.update', ['produto' => $produto_detalhe->id])}}">
    @csrf
    @method('PUT')
@else
<form method="POST" action="{{route('product.store')}}">
    @csrf
@endif
    <input type ="text" name="produto_id " value="{{ $produto_detalhe->produto_id ?? old('produto_id ') }}" placeholder="Nome" class="borda-preta">
    {{ $erros->has('nome') ? $errors->first('nome') : '' }}
    <input type ="text" name="descricao" value="{{ $produto_detalhe->descricao ?? old('descricao') }}" placeholder="Descrição" class="borda-preta">
    {{ $erros->has('descricao') ? $errors->first('descricao') : '' }}
    <input type ="text" name="peso" value="{{ $produto_detalhe->peso ?? old('peso') }}" placeholder="Peso" class="borda-preta">
    {{ $erros->has('peso') ? $errors->first('peso') : '' }}
    <select name="unidade_id">
        <option>Selecione a Unidade de Medida</option>
        @foreach($unidades as $unidade)
            <option value="{{$unidade->id}}" {{ $produto_detalhe->unidade_id ?? old('unidade_id') == $unidade->id ? 'selected' : '' }}>{{$unidade->descricao}}</option>
        @endforeach
    </select>
    {{$errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}
    <button type="submit" class="borda-preta">Adicionar</button>
</form>