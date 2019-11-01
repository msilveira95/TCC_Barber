<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>TCC - Barber</title>
        <link href='{{asset("css/app.css")}}' rel='stylesheet'>
        <link href='{{asset("css/estilo.css")}}' rel='stylesheet'>
        <link href='{{asset("fontawesome-free/css/all.css")}}' rel='stylesheet'>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-2 offset-xl-5 col-lg-2 offset-lg-5 col-md-4 offset-md-4 col-sm-4 offset-sm-4 col-8 offset-2">
                    <img src="{{asset('images/logo/logo-barber.jpeg')}}" class="img-fluid">
                </div>
            </div>
        </div>
        
        <nav class="navbar navbar-expand-md navbar-dark bg-primary">
            <a class="navbar-brand text-white" href="#">Barbearia</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-site">
                <span class="navbar-toggler-icon"></span>                
            </button>
            <div class="collapse navbar-collapse" id="navbar-site">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('site.servicos') }}">Serviços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('site.contato') }}">Contato</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('site.login') }}"><i class="fas fa-sign-in-alt"></i> Login</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="wrapper" class="container-fluid">
            <div class="body-content">
                @yield('conteudo')
            </div>
            <footer id="rodape">
                <div id="divRodape" class="col-lg-12 col-lg-offset-0">
                    <p>&copy; Conteúdo do rodapé</p>
                </div>
            </footer>
        </div>
        <script src='{{asset("js/app.js")}}'></script>
    </body>
</html>