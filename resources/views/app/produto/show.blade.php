@extends('app.layouts.basico')
@section('titulo','Produtos')
@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina" style='height:20px;padding-top:50px;padding-bottom:30px;'>
        <h1>Lista de Produtos</h1>
    </div>
    <div class="menu">
        <ul>
            <li><a href='{{ route('produto.index') }}'>Voltar</a></li>
            <li><a href='{{ route('produto.index') }}'>Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style='width:70%;margin-left:auto;margin-right:auto;'>
            <table border=1 style='width:70%'>
                <tbody>
                    <tr>
                        <td>Id</td>
                        <td>{{ $produto->id }}</td>
                    </tr>
                    <tr>
                        <td>Nome</td>
                        <td>{{ $produto->nome }}</td>
                    </tr>
                    <tr>
                        <td>Descrição</td>
                        <td>{{ $produto->descricao }}</td>
                    </tr>
                    <tr>
                        <td>Peso</td>
                        <td>{{ $produto->peso }} {{$unidade_peso->descricao}}</td>
                    </tr>
                    <tr>
                        <td>Unidade</td>
                        <td>{{ $unidade->unidade }}</td>
                    </tr>
                    
                 </tr>
                </tbody>
            </table>
            
        </div>
    </div>
</div>

@endsection