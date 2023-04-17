<div class="topo "  >

    <div class="logo">
        <img src="{{ asset('img/logo.png') }}">
    </div>

    <div class="menu" style='float: left;'>
        <ul>
            <li><a href="{{ route('app.home') }}">Dashboard</a></li>
            <li><a href="{{ route('app.cliente') }}">Cliente</a></li>
            <li><a href="{{ route('app.fornecedor') }}">Fornecedor</a></li>
            <li><a href="{{ route('produto.index') }}">Produto</a></li>
        </ul>
    </div>
    <div class="menu" style='float: right;background:red;'>
        <ul>
            <li><a style='color:white;' href="{{ route('app.sair') }}">Sair</a></li>
        </ul>
    </div>
</div>