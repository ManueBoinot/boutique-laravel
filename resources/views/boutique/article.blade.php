@extends('layouts.app')

@section('content')
    @php $campagne = ifPromo($article->id) @endphp
    <div class="container">
        <div class="text-bg-dark border-secondary rounded text-center" style="box-shadow: 1px 1px 10px grey;">
            <div class="row g-0">
                {{-- Image de l'article ---------------------------- --}}
                <div class="col-md-6">
                    <img src="{{ asset("$article->image") }}" class="img-fluid rounded-start" alt="{{ $article->nom }}">
                </div>

                <div class="col-md-6 p-5">
                    {{-- Nom de l'article ---------------------------- --}}
                    <div class="col">
                        <h3 class="text-uppercase fs-1 mb-4" style="color: #ffe140;">{{ $article->nom }}</h3>
                    </div>

                    {{-- Description de l'article ---------------------------- --}}
                    <div class="col">
                        <p class="fs-4 mb-4">{{ $article->description }}</p>
                    </div>
                    <div class="col">
                        <p class="fst-italic fs-4 mb-3"><i class="fa-solid fa-star fs-4"></i> Note des clients : <span
                                class="fs-2 fw-bold">{{ $article->note_moyenne }} / 5</span> </p>
                    </div>

                    {{-- Prix de l'article ---------------------------- --}}
                    <div class="col">
                        {{-- PRIX ARTICLE ---------------------------------------------------------------------------- --}}
                        @if ($campagne)
                            {{-- PRIX ARTICLE SI PROMO EN COURS --------------------------- --}}
                            <div class="card-text rounded mb-3" style="border: 1px solid rgb(255,225,64)">
                                <p class="m-0 fs-4"
                                    style="background: rgb(255,225,64);
                                background: radial-gradient(circle, rgba(252,235,145,1) 0%, rgba(255,225,64,1) 100%); color: black;">
                                    PROMO {{ $campagne->nom }}</p>

                                @php $prixPromo = $article->prix - ($article->prix * $campagne->reduction / 100)@endphp
                                <p class="m-0 px-1 fs-5"><del class="fs-4 text-secondary">{{ $article->prix }}
                                        €</del>
                                    <span class="fs-2" style="color: rgb(255,225,64)">{{ $prixPromo }} €</span>
                                    (- {{ $campagne->reduction }}%)
                                </p>
                                <p class="m-0">(la boîte de
                                    125
                                    g)
                                </p>

                                {{-- Ajout au panier ---------------------------- --}}
                                <form method="post" action="{{ route('panier.ajouter', $article) }}">
                                    @csrf
                                    <input class="fs-3 m-1 p-0" type="number" name="quantite" value="1" min="1"
                                        max="{{ $article['stock'] }}">
                                    <input type="hidden" name="article" value="{{ $article }}">
                                    <button class="btn btn-lg btn-outline-warning m-1"><i
                                            class="fa-solid fa-cart-plus fs-3"></i></button>
                                </form>
                            </div>
                        @else
                            {{-- PRIX ARTICLE HORS PROMO --------------------------- --}}
                            <p class="card-text m-0"><span class="fs-3">{{ $article->prix }} €</span> (boîte de
                                125 g)
                            </p>

                            {{-- Ajout au panier ---------------------------- --}}
                            <form method="post" action="{{ route('panier.ajouter', $article) }}">
                                @csrf
                                <input class="fs-3 m-1 p-0" type="number" name="quantite" value="1" min="1"
                                    max="{{ $article['stock'] }}">
                                <input type="hidden" name="article" value="{{ $article }}">
                                <button class="btn btn-lg btn-outline-warning m-1"><i
                                        class="fa-solid fa-cart-plus fs-3"></i></button>
                            </form>

                            {{-- Bouton FAVORIS --}}

                            <!-- si l'article est dans les favoris -->

                            @if (Auth::user() && Auth::user()->isInFavorites($article))
                                <form method="post" action="{{ route('favoris.destroy') }}">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="articleId" value="{{ $article->id }}">
                                    <button type="submit" class="btn btn-danger m-2">Retirer des favoris</button>
                                </form>

                                <!-- si l'article n'est pas dans les favoris -->
                            @else
                                <form method="post" action="{{ route('favoris.store') }}"> @csrf
                                    <input type="hidden" name="articleId" value="{{ $article->id }}">
                                    <button type="submit" class="btn btn-success m-2">Ajouter aux favoris</button>
                                </form>

                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
