@extends('site.layouts.basico')
@section('titulo',$titulo)
@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>Login</h1>
    </div>
    {{-- print_r($errors) --}}
    <div class="informacao-pagina">
        <div style='width:30%;margin-left:auto;margin-right:auto;'>
            <form action="{{ route('site.login')}}" method="POST">
                @csrf
                <label>Informe seu email</label>
                <input class='borda-preta' type="text" name='login' width='50%' value="{{ old('login')}}">
                    <span style=color:red>{{$errors->has('login') ? $errors->first('login'):''}}</span><br>
                <label>Informe sua senha</label>
                <input class='borda-preta' type="password" name='password' value="{{ old('password')}}"  '>
                    <span style=color:red>{{$errors->has('password') ? $errors->first('password'):''}}</span>
                <button type=submit class='borda-preta' >Logar</button>

            </form>
            {{ isset($erro) && $erro!='' ? 'Erro: '.$erro:'' }}
        </div>  
    </div>  
</div>

<div class="rodape">
    <div class="redes-sociais">
        <h2>Redes sociais</h2>
        <img src="{{ asset ('img/facebook.png') }}">
        <img src="{{ asset ('img/linkedin.png') }}">
        <img src="{{ asset ('img/youtube.png') }}">
    </div>
    <div class="area-contato">
        <h2>Contato</h2>
        <span>(11) 3333-4444</span>
        <br>
        <span>supergestao@dominio.com.br</span>
    </div>
    <div class="localizacao">
        <h2>Localização</h2>
        <img src="{{ asset ('img/mapa.png') }}">
    </div>
</div>
@endsection