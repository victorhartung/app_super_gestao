{{$slot}}

<form action="{{route('site.contact')}}" method="GET">
    @csrf
    <input name ="nome" value="" type="text" placeholder="Nome" class="{{$classe}}">
    <br>
    <input name="telefone"type="text" placeholder="Telefone" class="{{$classe}}">
    <br>
    <input name="email" type="text" placeholder="E-mail" class="{{$classe}}">
    <br>

    <select name="motivo_contatos" class="{{$classe}}">
        <option value="1">Qual o motivo do contato?</option>
        @foreach($motivo_contatos as $key => $motivo)
            <option value="{{$key}}" {{old('motivo') == $key ? 'selected' : '' }}>{{$motivo}}</option>
        @endforeach
        
    </select>
    <br>
    <textarea name="mensagem" class="{{$classe}}">Preencha aqui a sua mensagem</textarea>
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>