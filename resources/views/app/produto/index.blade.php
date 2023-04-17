@extends('app.layouts.basico')
@section('titulo','Produtos')
@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina" style='height:20px;padding-top:50px;padding-bottom:30px;'>
        <h1>Lista de Produtos</h1>
    </div>
    <div class="menu">
        <ul>
            <li><a href='{{ route('produto.create') }}'>Novo</a></li>
            <li><a href='{{ route('produto.index') }}'>Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style='width:70%;margin-left:auto;margin-right:auto;'>
            <table border=1 style='width:70%'>
                <thead>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Peso</th>
                    <th>Unidade Id</th>
                    <th>Visualizar</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                </thead>
                <tbody>
                    @if(isset($produtos))
                    @foreach ($produtos as $produto)
                    <tr>
                    <td>{{ $produto->prod_id }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->prod_desc }}</td>
                    <td>{{ $produto->peso }} {{$produto->peso_desc}}</td>
                    <td>{{$produto->uni_desc}}</td>
                    <td><a href='{{ route('produto.show',['produto'=>$produto->prod_id])}}'>Visualizar</a></td>
                    <td><a href='{{ route('produto.edit',['produto'=>$produto->prod_id])}}'>Alterar</a></td>
                    <td>
                        <form method='post' action='{{ route('produto.destroy',['produto'=>$produto->prod_id])}}'>
                            @csrf
                            @method('DELETE')
                            <button class='btn_excluir'  type="submit">Excluir</button>
                        </form>
                    </td>
                    
                 </tr>
             @endforeach
             @endif
                </tbody>
            </table>
            {{--PAGINAÇÃO--}}
            {{  $produtos->appends($request)->links() }}
            <!--
            <br>
            {{ $produtos->count()}} - Total de Registros por pagina
            <br>
            {{$produtos->total()}} - Total de Registros da consulta
            <br>
            {{$produtos->firstItem()}} - Numero do Primeiro registro da pagina
            <br>
            {{$produtos->lastItem()}} - Numero do Último registro da pagina
            -->
            <br>
            Exibindo {{ $produtos->count() }} registros de um total de {{ $produtos->total() }}  ( de {{$produtos->firstItem()}} a {{$produtos->lastItem()}} )
        </div>
    </div>
</div>

@endsection