@extends('app.layouts.basic')
@section('titulo', 'Fornecedores')
@section('content')

    <div class="conteudo-pagina">
        
        <div class="titulo-pagina-2">
            <p>Fornecedor - Adicionar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('app.provider.add')}}">Novo</a></li>
                <li><a href="{{route('app.provider')}}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            {{$msg}}
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method="POST" action="{{route('app.fornecedor.add')}}">
                    @csrf
                    <input type ="text" name="nome" value="{{old('nome')}}" placeholder="Nome" class="borda-preta">
                    {{$errors->has('nome') ? $errors->first('nome') : ''}}
                    <input type ="text" name="site" value="{{old('site')}}" placeholder="Site" class="borda-preta">
                    {{$errors->has('site') ? $errors->first('site') : ''}}
                    <input type ="text" name="uf" value="{{old('uf')}}" placeholder="UF" class="borda-preta">
                    {{$errors->has('uf') ? $errors->first('uf') : ''}}
                    <input type ="text" name="email" value="{{old('email')}}" placeholder="Email" class="borda-preta">
                    {{$errors->has('email') ? $errors->first('email') : ''}}
                    <button type="submit" class="borda-preta">Pesquisar</button>
                </form>
            </div>       
        </div>
    </div>

@endsection