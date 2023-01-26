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
        <!--<script src="/js/scripts.js"></script>-->
        <!-- Ajax Jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Icones -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
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
                            <a href="/resultados/qualificacoes" class="nav-link">Resultados</a>
                        </li>
                        <li class="nav-item">
                            <a href="/alunos/veraluno" class="nav-link">ver</a>
                        </li>
                        <li class="nav-item">
                            <a href="/inscricaoucaluno/inscricaouc" class="nav-link">Inscrição</a>
                        </li>
                      @endif
                      @if(auth()->user()->perfis_id==2)
                      <li class="nav-item">

                      <li class="nav-item">
                        <a href="/prof/verpprof" class="nav-link">Qualificação</a>
                     </li>
                        <li class="nav-item">
                                 <a href="/prof/addqa" class="nav-link">Prova</a>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="/prova/criar" class="nav-link">Elaborar</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="/questionarios/questo" class="nav-link">Questão</a>
                       <ul class="navbar-nav">
                           <li class="nav-item">
                               <a href="/questionarios/verucquest" class="nav-link">Ver</a>
                           </li>
                       </ul>
                   </li>
                        <li class="nav-item">
                            <a href="/temas/tema" class="nav-link">Tema</a>
                         </li>
                         <li class="nav-item">
                            <a href="/ucs/uc" class="nav-link">Uc</a>
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
        <main>
            @auth
            <div class="container-fluid">
                <div class="row">
                    <p  class="nomeado">
                        @if(auth()->user()->perfis_id==2)
                             Bem Vindo, Professor {{ Auth::user()->name }}
                        @else
                            @if(auth()->user()->perfis_id==3)
                                Bem Vindo, Estudante {{ Auth::user()->name }}
                            @else
                                Bem Vindo, {{ Auth::user()->name }}
                            @endif
                        @endif
                      </p>
                </div>
            </div>
            @endauth
            <div class="container-fluid">
                <div class="row">
                    @if(session('msg'))
                        <p class="msg">{{ session('msg') }}</p>

                    @endif
                </div>
                @yield('content')
            </div>
        </main>

      <footer>
        <p>DI UMINHO&copy; 2022</p>
      </footer>
    </body>
</html>
