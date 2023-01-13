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


<body class="text-bg-dark" style="font-family:Markazi Text, serif">

    <div id="app" class="sticky-top">
        {{-- NAVBAR ---------------------------------------------------------- --}}
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="z-index: 2">
            <div class="container">
                {{-- LOGO ---------------------------------------------------------- --}}
                <a class="navbar-brand me-auto" href="{{ url('http://127.0.0.1:8000/home') }}">
                    <h1 class="m-0 p-0" style="font-family:Passions Conflict, serif; color: #ffe140; font-size: 8rem;">
                        {{ config('app.name', 'Chocacao') }}</h1>
                </a>

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
                        <li class="nav-item dropdown px-4">
                            <a class="nav-link dropdown-toggle fs-3 text-light text-uppercase" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Produits</a>
                            <ul class="dropdown-menu text-bg-dark">
                                <li><a class="dropdown-item text-light fs-3" href="/articles">De A à Z</a></li>
                                <li><a class="dropdown-item text-light fs-3" href="/gammes">Par gamme</a></li>
                                <li><a class="dropdown-item text-light fs-3" href="/populaires">Populaires</a></li>
                            </ul>
                        </li>
                        {{-- Lien vers PROMOTIONS --------------------- --}}
                        <li class="nav-item px-4">
                            <a class="nav-link fs-3 text-light text-uppercase" href="/campagne">Promotions</a>
                        </li>
                        {{-- Lien vers PANIER --------------------- --}}
                        <li class="nav-item px-4">
                            <a class="nav-link fs-3 text-light" href="/panier" title="Panier"><i
                                    class="fa-solid fa-cart-shopping"></i></a>
                        </li>

                        {{-- Lien vers ESPACE CLIENT --------------------- --}}
                        @if (Auth::user())
                            {{-- Liens USER --------------------- --}}
                            <li class="nav-item dropdown px-4">
                                <a class="nav-link dropdown-toggle fs-3" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false" style="color: rgb(255,225,64)"
                                    title="Espace client">
                                    <i class="fa-regular fa-user"></i>
                                </a>
                                <ul class="dropdown-menu text-bg-dark">
                                    <li><a class="dropdown-item text-light fs-3"
                                            href="{{ route('favoris.index', Auth::user()) }}">Mes favoris</a></li>
                                    <li><a class="dropdown-item text-light fs-3"
                                            href="{{ route('commande.index', Auth::user()) }}">Mes commandes</a></li>
                                    <li><a class="dropdown-item text-light fs-3"
                                            href="{{ route('users.show', Auth::user()) }}">Mes informations
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
                            {{-- Lien ADMIN vers BACK OFFICE --------------------- --}}
                            @if (Auth::user()->isAdmin())
                                <li class="nav-item px-4">
                                    <a class="nav-link fs-3 text-danger border border-danger rounded" href="/admin"
                                        title="Back-office"><i class="fa-solid fa-lock p-2"></i></a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown px-4">
                                <a class="nav-link dropdown-toggle fs-3" style="color: rgb(255,225,64)" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-regular fa-user" style="color: rgb(255,225,64)"></i>
                                </a>
                                <ul class="dropdown-menu text-bg-dark">
                                    <li class="nav-item">
                                        <a class="nav-link text-light fs-4"
                                            href="{{ route('login') }}">{{ __('Se connecter') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-light fs-4"
                                            href="{{ route('register') }}">{{ __('Créer un compte') }}</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        {{-- BANDEAU PROMOTION SI PROMO EN COURS ------------------------------------------ --}}

        {{-- @php $routeName = Request::route()->getName() @endphp --}}
        @if ((Auth::user() && !Auth::user()->isAdmin()) || !Auth::user())
            <div class="container-fluid" id="bandeau-promo">
                @php $promo = todayPromo() @endphp
                @include('boutique.bandeau-promo')
            </div>
        @endif

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
        <div class="container mb-3 pt-5" style="border-top: 1px solid grey">
            <ul class="list-group list-group-flush d-flex flex-row flex-wrap">
                <li class="text-white list-group-item text-bg-dark mx-auto"><a class="text-decoration-none text-light"
                        href="/articles">Nos produits</a></li>
                <li class="text-white list-group-item text-bg-dark mx-auto"><a class="text-decoration-none text-light"
                        href="/campagne">Promotions</a></li>
                @auth<li class="text-white list-group-item text-bg-dark mx-auto"><a
                            class="text-decoration-none text-light" href="{{ route('users.show', Auth::user()) }}">Espace
                        client</a></li>@endauth
            </ul>
        </div>

        <p>CHOCACAO - Tous droits réservés (2023)</p>
    </footer>

</body>

</html>
