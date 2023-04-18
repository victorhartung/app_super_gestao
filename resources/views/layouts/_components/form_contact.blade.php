{{$slot}}

<form action="{{route('site.contact')}}" method="GET">
    @csrf
    <input name ="nome" value="" type="text" placeholder="Nome" class="{{$classe}}">
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
            <option value="{{$motivo->id}}" {{old('motivo') == $motivo_contato->id 'selected' : '' }}>{{$motivo->motivo_contato}}</option>
        @endforeach
        
    </select>
    {{$errors->has('motivos_contatos') ? $errors->first('motivos_contatos') : ''}}
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