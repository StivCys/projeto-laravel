@extends('app.layouts.basico')
@section('titulo','Fornecedores')
@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina" style='height:20px;padding-top:50px;padding-bottom:30px;'>
        <h1>Fornecedores - Adicionar</h1>
    </div>
    <div class="menu">
        <ul>
            <li><a href='{{route('app.fornecedor.adicionar')}}'>Novo</a></li>
            <li><a href='{{route('app.fornecedor')}}'>Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style='width:30%;margin-left:auto;margin-right:auto;'>
            {{ $msg ?? ''}}
            <form method="post" action='{{ route('app.fornecedor.adicionar')}}'>
                @csrf
                <input type="hidden" name="id" value="{{ $fornecedor->id ?? ''}}">
                <input type='text' placeholder="nome" class='borda-preta' name='nome' value="{{ $fornecedor->nome ?? old('nome')}}">
                {{$errors->has('nome') ? $errors->first('nome'):'' }}
                <input type='text' placeholder="site" class='borda-preta' name='site' value="{{ $fornecedor->site ?? old('site')}}">
                {{$errors->has('site') ? $errors->first('site'):'' }}
                <input type='text' placeholder="uf" class='borda-preta' name='uf' value="{{ $fornecedor->uf ?? old('uf')}}">
                {{$errors->has('uf') ? $errors->first('uf'):'' }}
                <input type='text' placeholder="email" class='borda-preta' name='email' value="{{ $fornecedor->email ?? old('email')}}">
                {{$errors->has('email') ? $errors->first('email'):'' }}
                <button type="submit" class='borda-preta'>Adicionar / Salvar</button>
            </form>
        </div>
    </div>
</div>

@endsection