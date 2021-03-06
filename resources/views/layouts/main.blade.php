<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- fonte -->
        <link href="https://fonts.googleapis.com/css2?family=Alata&family=Outfit:wght@100&family=Roboto" rel="stylesheet">
        
        <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- css -->
        <link href="{{ asset('./css/style.css') }}" rel="stylesheet">

        <!-- js -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

        <!-- script -->
        <script src="/js/script.js"></script>

          <!-- icons -->

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    </head>
    <body class="antialiased">
        <header>
            <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">TWL EVENTS</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav">
                        <li id="nav-item" class="nav-item">
                            <a class="nav-link" href="/">Eventos</a>
                        </li>
                        <li id="nav-item" class="nav-item">
                            <a class="nav-link" href="/events/create">Criar Eventos</a>
                        </li>
                        @auth
                            <li id="nav-item" class="nav-item">
                                <a class="nav-link" href="/dashboard">Meus Eventos</a>
                            </li>
                            <li id="nav-item" class="nav-item">
                            <form method="POST" name="logout" action="{{ route('logout') }}">
                                @csrf
                                <a href="javascript:document.logout.submit()" class="nav-link" >Sair</a>
                            </form>
                            </li>
                        @endauth
                        @guest
                            <li id="nav-item" class="nav-item">
                                <a class="nav-link" href="/login">Entrar</a>
                            </li>
                            <li id="nav-item" class="nav-item">
                                <a href="/register" class="nav-link">Cadastrar</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </header>
        <main>
            <div class="container-fluid">
                <div class="row">
                    @if(session('msg'))
                        <p class="msg">{{ session('msg') }}</p>
                    @endif
                    @yield('content')
                </div>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div><br />
            @endif
        </main>
        
    </body>
    <footer class="footer bg-light">
        <p>TWL Events &copy; 2022</p>	
    </footer>
</html>
