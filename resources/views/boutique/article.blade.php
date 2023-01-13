@extends('layouts.app')

@section('content')
    @php $campagne = ifPromo($article->id) @endphp
    <div class="container">
        <div class="row g-0 text-bg-dark border-secondary rounded text-center" style="box-shadow: 1px 1px 10px grey;">
            {{-- Image de l'article ---------------------------- --}}
            <div class="col-md-6">
                <img src="{{ asset("$article->image") }}" class="img-fluid rounded-start" alt="{{ $article->nom }}">
            </div>

            <div class="col-md-6 p-5">
                <div>
                    {{-- Nom de l'article ---------------------------- --}}
                    <div class="col d-flex justify-content-center gap-5 align-items-center mb-3">
                        <h3 class="text-uppercase fs-1 m-0" style="color: #ffe140;">{{ $article->nom }}</h3>

                        {{-- Bouton FAVORIS --}}

                        <!-- si l'article est dans les favoris -->
                        @if (Auth::user() && Auth::user()->isInFavorites($article))
                            <form method="post" action="{{ route('favoris.destroy') }}">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="articleId" value="{{ $article->id }}">
                                <button type="submit" class="btn"><i class="fa-solid fa-heart fs-2"
                                        style="color: #ffe140;"></i></button>
                            </form>

                            <!-- si l'article n'est pas dans les favoris -->
                        @else
                            <form method="post" action="{{ route('favoris.store') }}"> @csrf
                                <input type="hidden" name="articleId" value="{{ $article->id }}">
                                <button type="submit" class="btn"><i
                                        class="fa-regular fa-heart text-white fs-2"></i></button>
                            </form>
                        @endif
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
                        @endif
                    </div>
                </div>

                {{-- Avis clients --}}
                <div class="accordion accordion-flush mx-5" id="accordionFlushExample">
                    <div class="accordion-item">

                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed text-bg-warning fs-5" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                AVIS CLIENTS
                            </button>
                        </h2>

                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body text-bg-light">
                                @foreach ($article->avis as $avis)
                                    <div class="border-top p-3 my-2">
                                        <div class="d-flex gap-5">
                                            <h5>Commentaire de : {{ $avis->user['nom'] }}
                                                ({{ date('d-m-Y', strtotime($avis->created_at)) }})
                                            </h5>
                                            <h5>Note : {{ $avis['note'] }} / 5</h5>
                                        </div>

                                        <p class="text-start fs-4"><i class="fa-solid fa-quote-left"></i>
                                            {{ $avis['texte'] }} <i class="fa-solid fa-quote-right"></i> </p>

                                        @auth
                                            @if (Auth::user()->role_id == '2')
                                                <form method="post" action="{{ route('avis.destroy', $avis) }}">
                                                    @method('delete')
                                                    @csrf
                                                    <input type="hidden" name="article_id" value="{{ $avis['article_id'] }}">
                                                    <button class="btn btn-danger mt-2 mb-2" type="submit">Supprimer le
                                                        commentaire</button>
                                                </form>
                                            @endif
                                        @endauth
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                
                @auth
                    <form method="post" action="{{ route('avis.store') }}">
                        @csrf
                        <label class="label-control">
                            Commentaire:</label>
                        <input class="form-control w-75 mx-auto" name="texte">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="article_id" value="{{ $article['id'] }}">
                        <label class="label-control">Note:</label>
                        <select name="note" class="form-control w-25 mx-auto">
                            <option disabled selected value="">Sélectionnez...</option>
                            <option value="5"> 5 </option>
                            <option value="4"> 4 </option>
                            <option value="3"> 3 </option>
                            <option value="2"> 2 </option>
                            <option value="1"> 1 </option>
                        </select>
                        <button class="btn btn-primary mt-2 mb-2">Poster le commentaire</button>
                    </form>
                @endauth

                @guest
                    <div class="alert alert-warning">Vous devez être connecté pour pouvoir poster un avis</div>
                @endguest
            </div>

        </div>
    </div>
    </div>
@endsection
