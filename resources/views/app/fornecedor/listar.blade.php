@extends('app.layouts.basico')
@section('titulo','Fornecedores')
@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina" style='height:20px;padding-top:50px;padding-bottom:30px;'>
        <h1>LIsta de Fornecedores</h1>
    </div>
    <div class="menu">
        <ul>
            <li><a href='{{route('app.fornecedor.adicionar')}}'>Novo</a></li>
            <li><a href='{{route('app.fornecedor')}}'>Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style='width:70%;margin-left:auto;margin-right:auto;'>
            <table border=1 style='width:70%'>
                <thead>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Site</th>
                    <th>UF</th>
                    <th>Email</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                </thead>
                <tbody>
             @if(isset($fornecedores))
             @foreach ($fornecedores as $fornecedor)
                 <tr>
                    <td>{{ $fornecedor->id }}</td>
                    <td>{{ $fornecedor->nome }}</td>
                    <td>{{ $fornecedor->site }}</td>
                    <td>{{ $fornecedor->uf }}</td>
                    <td>{{ $fornecedor->email }}</td>
                    <td><a href='{{ route('app.fornecedor.alterar',$fornecedor->id) }}'>Alterar</a></td>
                    <td><a href='{{ route('app.fornecedor.excluir',$fornecedor->id) }}'>Excluir</a></td>
                    
                 </tr>
             @endforeach
             @endif
                </tbody>
            </table>
            {{--PAGINAÇÃO--}}
            {{  $fornecedores->appends($request)->links() }}
            <!--
            <br>
            {{ $fornecedores->count()}} - Total de Registros por pagina
            <br>
            {{$fornecedores->total()}} - Total de Registros da consulta
            <br>
            {{$fornecedores->firstItem()}} - Numero do Primeiro registro da pagina
            <br>
            {{$fornecedores->lastItem()}} - Numero do Último registro da pagina
            -->
            <br>
            Exibindo {{ $fornecedores->count() }} registros de um total de {{ $fornecedores->total() }}  ( de {{$fornecedores->firstItem()}} a {{$fornecedores->lastItem()}} )
        </div>
    </div>
</div>

@endsection