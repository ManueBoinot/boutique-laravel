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
    <script src="https://kit.fontawesome.com/cfc69e35cf.js" crossorigin="anonymous"></script>
</head>


<body class="text-bg-dark" style="font-family:Markazi Text, serif;">

    <div id="app" class="sticky-top">
        {{-- NAVBAR ---------------------------------------------------------- --}}
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="z-index: 2">
            <div class="container">
                {{-- LOGO ---------------------------------------------------------- --}}
                <a class="navbar-brand me-auto" href="{{ url('http://127.0.0.1:8000/') }}">
                    <h1 class="m-0 p-0" style="font-family:Passions Conflict, serif; color: #ffe140; font-size: 8rem;">
                        {{ config('app.name', 'Chocacao') }}</h1>
                </a>
                <!-- AFFICHAGE POUR VISITEURS --------------------------------------- -->
                @guest
                    @if (Route::has('login'))
                        <button type="button" class="btn btn-warning nav-item fs-3">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
                        </button>
                    @endif

                    @if (Route::has('register'))
                        <button type="button" class="btn btn-outline-warning nav-item fs-3 ms-5">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Créer un compte') }}</a>
                        </button>
                    @endif

                    <!-- AFFICHAGE POUR USERS CONNECTÉS -------------------------------- -->
                @else
                    {{-- BURGER ---------------------- --}}
                    <button class="navbar-toggler mx-auto fs-1" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    {{-- NAVBAR BOUTONS ---------------------- --}}
                    <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            {{-- Lien vers ARTICLES --------------------- --}}
                            <li class="nav-item px-4">
                                <a class="nav-link fs-3 text-light text-uppercase" href="/produits">Produits</a>
                            </li>
                            {{-- Lien vers PROMOTIONS --------------------- --}}
                            <li class="nav-item px-4">
                                <a class="nav-link fs-3 text-light text-uppercase" href="/produits">Promotions</a>
                            </li>
                            {{-- Lien vers PANIER --------------------- --}}
                            <li class="nav-item px-4">
                                <a class="nav-link fs-3 text-light" href="/panier"><i
                                        class="fa-solid fa-cart-shopping"></i></a>
                            </li>
                            {{-- Lien vers ESPACE CLIENT --------------------- --}}
                            <li class="nav-item dropdown px-4">
                                <a class="nav-link dropdown-toggle fs-3 text-light" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-user"></i>
                                </a>
                                <ul class="dropdown-menu text-bg-dark">
                                    <li><a class="dropdown-item text-light fs-3" href="#">Mes favoris</a></li>
                                    <li><a class="dropdown-item text-light fs-3" href="#">Mes commandes</a></li>
                                    <li><a class="dropdown-item text-light fs-3" href="#">Mes informations
                                            personnelles</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li> {{-- lien pour se déconnecter --}}
                                        <a class="dropdown-item text-danger fs-3" href="{{ route('logout') }}"
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
                        </ul>
                    </div>
                @endguest
            </div>
        </nav>

        {{-- BANDEAU PROMOTION ---------------------------------------------------------- --}}
        <div class="container-fluid" id="bandeau-promo">
            @include('bandeau-promo')
        </div>
    </div>


    {{-- MESSAGES D'ALERTES ---------------------------------------------------------- --}}
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

    {{-- CORPS DE LA PAGE ---------------------------------------------------------- --}}
    <main class="container py-4">
        @yield('content')
    </main>

    {{-- FOOTER ---------------------------------------------------------- --}}
    <footer class="container-fluid text-center">
        <div class="container mb-3">
            <ul class="list-group list-group-flush d-flex flex-row flex-wrap">
                <li class="text-white list-group-item text-bg-dark mx-auto"><a class="text-decoration-none text-light"
                        href="/produits">Nos produits</a></li>
                <li class="text-white list-group-item text-bg-dark mx-auto"><a class="text-decoration-none text-light"
                        href="/promotions">Promotions</a></li>
                <li class="text-white list-group-item text-bg-dark mx-auto"><a class="text-decoration-none text-light"
                        href="/profil">Espace client</a></li>
                <li class="text-white list-group-item text-bg-dark mx-auto"><a class="text-decoration-none text-light"
                        href="/a-propos">À propos</a></li>
                <li class="text-white list-group-item text-bg-dark mx-auto"><a class="text-decoration-none text-light"
                        href="/contact">Contact</a></li>
            </ul>
        </div>

        <p>CHOCACAO - Tous droits réservés (2023)</p>
    </footer>

</body>

</html>