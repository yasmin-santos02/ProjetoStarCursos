<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!--CORRIGIR ICON DA ABA-->
    <link href="{{ asset('/img/marcaSite.ico') }}" rel="icon" type="image/x-icon">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <title>MarcaSite - Cursos</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        .busca-coluna {
            padding-left: 15px;

        }

        .espacamento {
            margin: 0 20px;
        }

        .container {
            max-width: 1200px;
            /* Defina a largura máxima desejada */
            margin: 0 auto;
            /* Centraliza horizontalmente */
            padding: 20px;
            /* Adiciona algum espaço interno */
        }

        .content-box {
            background-color: #f8f9fa;
            /* Cor de fundo da caixa de conteúdo */
            border: 1px solid #dee2e6;
            /* Borda da caixa de conteúdo */
            border-radius: 5px;
            /* Borda arredondada */
            padding: 20px;
            /* Espaçamento interno */
            margin-bottom: 20px;
            /* Espaçamento inferior */
            text-align: justify;
        }


        a {
            background-color: transparent
        }


        a {
            color: inherit;
            text-decoration: inherit
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        /* CORRIGIR LOGO */
        .container {
            width: 100%;
            /* Definindo a largura do contêiner */
            margin: auto auto;
            /* Centralizando o contêiner horizontalmente */
        }

        /* Estilizando a imagem */
        .container img {
            width: 100%;
            /* A imagem ocupará 100% da largura do contêiner */
            height: auto;
            /* A altura será ajustada automaticamente de acordo com a largura */
            display: block;
            /* Garantindo que a imagem não tenha espaços extras */
        }

        html {
            font-size: 14px;
        }

        @media (min-width: 768px) {
            html {
                font-size: 16px;
            }
        }

        html {
            position: relative;
            min-height: 100%;
        }

        body {
            margin-bottom: 60px;
            font-family: 'Nunito', sans-serif;
        }

        button {
            margin-bottom: 12px;
        }

        .navbar-nav {
            justify-content: flex-end;
            padding: 5px 10px;
        }

        #navbarNavDropdown {
            background-color: #dcdcdc;
        }

        .sucess {
            background-color: #D4EDDA;
            color: #155724;
            border: 1px solid #C3E6CB;
            width: 100%;
            margin-bottom: 0;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>

<body class="antialiased">
    <header>
        <!--NAV BAR COM AS OPÇÕES DE PESQUISA (BOOTSTRAP-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a href="{{ route('home') }}" class="nav-link" href="#">Início <span
                                class="sr-only"></span></a>
                    </li>
                    <li class="nav-item active">
                        <a href="{{ route('inscricoes.create') }}" class="nav-link" href="#">Inscrições <span
                                class="sr-only"></span></a>
                    </li>
                    <li class="nav-item active">
                        <a href="{{ route('listagemInscricoes.filtrar') }}" class="nav-link" href="#">Listar e
                            editar inscrições <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item active">
                        <a href="{{ route('cadastroCurso.cadastrar') }}" class="nav-link" href="#">Novo curso
                            <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item active">
                        <a href="{{ route('listagemCursos.filtrarCursos') }}"class="nav-link" href="#">Lista de
                            cursos <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item active">
                        <a href="{{ route('cadastroUsuario.cadastrar') }}" class="nav-link" href="#">Cadastro de
                            Usuários <span class="sr-only"></span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div>
        <!--corrigir logos

        <div>
            <img src="{{ asset('img/marcaSite.ico') }}" alt="teste">
        </div>
-->
        <main>
            <div class="container-fluid">
                <div class="row">
                    @if (session('sucess'))
                        <p class="sucess">{{ session('sucess') }}</p>
                    @endif
                    @yield('content')
                </div>
            </div>
        </main>

        <footer class="border-top footer text-muted">
            <div class="flex justify-center mt-4 sm:items-center sm:justify-between text-center text-sm text-gray-500">
                &copy; 2024 - MarcaSite Cursos -
                <a href="{{ route('sobre') }}" class="ml-1 underline">
                    Sobre
                </a>
            </div>
    </div>
    </footer>
</body>

</html>
