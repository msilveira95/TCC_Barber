<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>TCC - Barber</title>
        <link href='{{asset("css/app.css")}}' rel='stylesheet'>
        <link href='{{asset("css/estilo.css")}}' rel='stylesheet'>
        <link href='{{asset("fontawesome-free/css/all.min.css")}}' rel='stylesheet'>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-site">
                <span class="navbar-toggler-icon"></span>                
            </button>
            <div class="collapse navbar-collapse" id="navbar-site">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-plus"></i> Usuarios
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('cadastrar-usuario') }}">Cadastrar usuário</a>
                            <a class="dropdown-item" href="{{ route('listar-usuarios') }}">Pesquisar usuários</a>  
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-cut"></i> Produtos/Serviços
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('cadastrar-produto') }}">Cadastrar produtos/serviços</a>
                            <a class="dropdown-item" href="{{ route('listar-produtos') }}">Pesquisar produtos/serviços</a>  
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-dollar-sign"></i> Contas
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('cadastrar-conta') }}">Inserir gastos</a>
                            <a class="dropdown-item" href="{{ route('listar-contas') }}">Pesquisar contas cadastradas</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-cash-register"></i> Vendas
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('cadastrar-venda') }}">PDV</a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('site.logoff') }}"><i class="fas fa-sign-out-alt"></i> Logoff</a>
                    </li>
                </ul>
            </div>
        </nav>
        @yield('conteudo')
        <script src='{{asset("js/app.js")}}'></script>
        @hasSection('javascript')
            @yield('javascript')
        @endif
    </body>
</html>