{{$slot}}

<form action="{{route('site.contact')}}" method="POST">
    @csrf
    <input name ="nome" value="{{old('nome')}}" type="text" placeholder="Nome" class="{{$classe}}">
    @if($errors->has('nome'))
        {{$errors->first('nome')}}
    @endif
    
    <br>
    <input name="telefone"type="text" placeholder="Telefone" class="{{$classe}}">
    {{$errors->has('telefone') ? $errors->first('telefone') : ''}}
    <br>
    <input name="email" type="text" placeholder="E-mail" class="{{$classe}}">
    {{$errors->has('email') ? $errors->first('email') : ''}}
    <br>

    <select name="motivo_contatos" class="{{$classe}}">
        <option value="1">Qual o motivo do contato?</option>
        @foreach($motivo_contatos as $key => $motivo)
            <option value="{{$motivo->id}}" {{old('motivo_contatos') == $motivo_contatos->id ? 'selected' : '' }}>{{$motivo->motivo_contatos}}</option>
        @endforeach
        
    </select>
    {{$errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : ''}}
    <br>
    <textarea name="mensagem" class="{{$classe}}">Preencha aqui a sua mensagem</textarea>
    {{$errors->has('mensagem') ? $errors->first('mensagem') : ''}}
    
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>

@if($errors->any())

    @foreach($errors->all() as $erro)
        {{$erro}}
    @endforeach

@endif