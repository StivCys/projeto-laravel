@extends('app.layouts.basico')
@section('titulo','Fornecedores')
@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina" style='height:20px;padding-top:50px;padding-bottom:30px;'>
        <h1>Cadastro de Fornecedores</h1>
    </div>
    <div class="menu">
        <ul>
            <li><a href='{{route('app.fornecedor.adicionar')}}'>Novo</a></li>
            <li><a href='{{route('app.fornecedor')}}'>Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style='width:30%;margin-left:auto;margin-right:auto;'>
            <form method="post" action='{{ route('app.fornecedor.listar')}}'>
                @csrf
                <input type='text' placeholder="nome" class='borda-preta' name='nome'>
                <input type='text' placeholder="site" class='borda-preta' name='site'>
                <input type='text' placeholder="uf" class='borda-preta' name='uf'>
                <input type='text' placeholder="email" class='borda-preta' name='email'>
                <button type="submit" class='borda-preta'>Pesquisar/ Filtrar</button>
            </form>
        </div>
        {{-- @include('app.fornecedor.listar') --}}
    </div>
</div>

@endsection