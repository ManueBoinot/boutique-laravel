<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- pour insérer un titre dynamique sur chaque page --}}
    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Markazi+Text:wght@400;700&family=Passions+Conflict&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="bg-black" style="font-family:Markazi Text, serif; color: gold;">

    <div class="container-fluid text-center">
        @if (session()->has('message'))
            <p class="alert alert-success">{{ session()->get('message') }}</p>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>


    <div id="app">
        <nav class="navbar navbar-dark bg-black fixed-top" style="font-size: 2rem;">
            <div class="container">
                {{-- LOGO ---------------------------------------------------------- --}}
                <a class="navbar-brand" href="{{ url('http://127.0.0.1:8000/') }}"
                    style="font-family:Passions Conflict, serif; font-size: 10rem; color: gold;">
                    {{ config('app.name', 'Chocacao') }}
                </a>
                <!-- AFFICHAGE POUR VISITEURS --------------------------------------- -->
                @guest
                    @if (Route::has('login'))
                        <button type="button" class="btn btn-warning nav-item fs-3">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
                        </button>
                    @endif

                    @if (Route::has('register'))
                        <button type="button" class="btn btn-outline-warning nav-item fs-3">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Créer un compte') }}</a>
                        </button>
                    @endif

                    <!-- AFFICHAGE POUR USERS CONNECTÉS -------------------------------- -->
                @else
                    {{-- BURGER ---------------------------------------------------------- --}}
                    <button class="navbar-toggler fs-1" style="color: gold; border: 1px solid gold;" type="button"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar"
                        aria-controls="offcanvasDarkNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    {{-- MENU CACHÉ ---------------------------------------------------------- --}}
                    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
                        aria-labelledby="offcanvasDarkNavbarLabel">
                        {{-- Titre du menu caché ---------------------------------------------------------- --}}
                        <div class="offcanvas-header">
                            <h3 class="offcanvas-title"
                                style="font-family:Passions Conflict, serif; font-size: 4rem; color: gold;"
                                id="offcanvasDarkNavbarLabel">Chocacao</h3>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        {{-- Corps du menu caché ---------------------------------------------------------- --}}
                        <div class="offcanvas-body">
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                {{-- Lien vers HOME ---------------------- --}}
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="/home">Accueil</a>
                                </li>
                                {{-- Lien vers ARTICLES ---------------------- --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="/produits">Nos produits</a>
                                </li>
                                {{-- Lien vers CAMPAGNES ---------------------- --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="/promotions">Nos promotions</a>
                                </li>
                                {{-- Menu déroulant ESPACE CLIENT ---------------------------------------------------------- --}}
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Espace client
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark" style="font-size: 2rem;">
                                        {{-- Lien vers FAVORIS ---------------------- --}}
                                        <li><a class="dropdown-item" href="#">Vos
                                                favoris</a></li>
                                        {{-- Lien vers COMMANDES ---------------------- --}}
                                        <li><a class="dropdown-item" href="#">Vos commandes</a>
                                        </li>
                                        {{-- Lien vers COMPTE ---------------------- --}}
                                        <li><a class="dropdown-item" href="#">Vos
                                                informations personnelles</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        {{-- Lien vers DÉCONNEXION ---------------------- --}}
                                        <li>
                                            <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('DÉCONNEXION') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">À propos de Chocacao</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endguest
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="container-fluid">
            <p class="text-center">CHOCACAO - Tous droits réservés (2023)</p>
        </footer>
    </div>
</body>

</html>
