<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="/img/logoum2.ico" type="image/x-icon">

        <title>@yield('title')</title>

        <!-- Fonte do Google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!-- CSS Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!-- CSS da aplicação -->
        <link rel="stylesheet" href="/css/style.css">
        <script src="/js/scripts.js"></script>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbar">
                  <a href="/" class="navbar-brand">
                    <img src="/img/portal-logo-t.png" alt="Exame">
                  </a>
                  <ul class="navbar-nav">
                    @auth
                    @if(auth()->user()->perfis_id==1)
                        <li class="nav-item">
                            <a href="/" class="nav-link">Cursos</a>
                        </li>
                        <li class="nav-item">
                            <a href="/prova/realizar" class="nav-link">Departamentos</a>
                        </li>
                    @endif
                      @if(auth()->user()->perfis_id==3)
                        <li class="nav-item">
                            <a href="/" class="nav-link">Resultados</a>
                        </li>
                        <li class="nav-item">
                            <a href="/prova/realizar" class="nav-link">Realizar</a>
                        </li>
                      @endif
                      @if(auth()->user()->perfis_id==2)
                        <li class="nav-item">
                                 <a href="/prova/criar" class="nav-link">Prova</a>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="/prova/quest" class="nav-link">Questões</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/prova/criar" class="nav-link">Elaborar</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/prova/criar" class="nav-link">Visualizar</a>
                                 </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="/impressao" class="nav-link">Visualizar</a>
                         </li>
                      @endif
                    <li class="nav-item">
                        <form action="/logout" method="POST">
                            @csrf
                            <a href="/logout" class="nav-link" onclick="event.preventDefault();
                                this.closest('form').submit();">Sair</a>
                        </form>
                      </li>
                    @endauth
                    @guest
                    <li class="nav-item">
                      <a href="/login" class="nav-link">Entrar</a>
                    </li>
                    <li class="nav-item">
                      <a href="/register" class="nav-link">Cadastrar</a>
                    </li>
                      @endguest
                  </ul>
                </div>
              </nav>
        </header>
      @yield('content')
      <footer>
        <p>DI UMINHO&copy; 2022</p>
      </footer>
    </body>
</html>
