{{-- AFFICHAGE DE 3 ARTICLES EN PROMO SI PROMO EN COURS SINON 3 ARTICLES RANDOM --}}
@if (isset($promo))
    <div class="row justify-content-center text-center my-5">
        <h1 style="color: #ffed8a">EN PROMOTION !</h1>

        @foreach ($promo->articles as $article)
            @php $campagne = ifPromo($article->id) @endphp
            <div class="col-12 col-md-6 col-lg-4">
                <div class="text-bg-dark border-secondary card mb-3"
                    style="max-width: 540px; box-shadow: 1px 1px 10px grey;">
                    <div class="row g-0">
                        <div class="col-md-6">
                            {{-- IMAGE ARTICLE --}}
                            <img src="{{ $article->image }}" class="img-fluid rounded-start" alt="{{ $article->nom }}">

                            {{-- Bouton VOIR PRODUIT --}}
                            <a href="{{ route('article.show', $article) }}" class="btn btn-light fs-5 mt-4"
                                role="button">Voir le produit</a>
                        </div>

                        <div class="col-md-6">
                            <div class="card-body">
                                {{-- NOM ARTICLE --}}
                                <h3 class="card-title text-uppercase">{{ $article->nom }}</h3>

                                {{-- DESCRIPTION ARTICLE --}}
                                <p class="card-text mb-3" style="height: 100px;">
                                    {{ substr($article->description, 0, 120) . '...' }}</p>


                                {{-- NOTE ARTICLE --}}
                                <p class="fst-italic mb-3"><i class="fa-solid fa-star"></i> Note des clients : <span
                                        class="fw-bold">{{ $article->note_moyenne }} / 5</span> </p>


                                {{-- PRIX ARTICLE --}}
                                <div class="card-text rounded mb-2 pb-2" style="border: 1px solid rgb(255,225,64)">
                                    <p class="m-0"
                                        style="background: rgb(255,225,64);
                                background: radial-gradient(circle, rgba(252,235,145,1) 0%, rgba(255,225,64,1) 100%); color: black;">
                                        PROMO {{ $campagne->nom }}</p>

                                    @php $prixPromo = $article->prix - ($article->prix * $campagne->reduction / 100)@endphp
                                    <p class="m-0 px-1 fs-5"><del
                                            class="fs-5 text-secondary">{{ number_format($article->prix, 2, ',') }}
                                            €</del></p>
                                    <p class="m-0">
                                        <span class="fs-4"
                                            style="color: rgb(255,225,64)">{{ number_format($prixPromo, 2, ',') }}
                                            €</span>
                                        (- {{ $campagne->reduction }}%)
                                    </p>
                                    <p class="m">(la boîte de
                                        125
                                        g)
                                    </p>

                                    {{-- Bouton AJOUT AU PANIER --}}
                                    <form method="post" action="{{ route('panier.ajouter', $article) }}">
                                        @csrf
                                        <input class="fs-4 text-end" type="number" name="quantite" value="1"
                                            min="1" max="{{ $article['stock'] }}">
                                        <input type="hidden" name="article" value="{{ $article }}">
                                        <button class="btn btn-lg btn-outline-warning"><i
                                                class="fa-solid fa-cart-plus p-0 m-0"></i></button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- AFFICHAGE DE 3 ARTICLES RANDOM --}}
@else
    <div class="row justify-content-center text-center my-5">
        <h1 style="color: #ffed8a">NOTRE SÉLECTION</h1>

        @foreach ($articles as $article)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="text-bg-dark border-secondary card mb-3"
                    style="max-width: 540px; box-shadow: 1px 1px 10px grey;">
                    <div class="row g-0">
                        <div class="col-md-6">
                            {{-- IMAGE ARTICLE --}}
                            <img src="{{ $article->image }}" class="img-fluid rounded-start"
                                alt="{{ $article->nom }}">
                            {{-- Bouton VOIR PRODUIT --}}
                            <a href="{{ route('article.show', $article) }}" class="btn btn-light fs-5 mt-4"
                                role="button">Voir le produit</a>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                {{-- NOM ARTICLE --}}
                                <h3 class="card-title text-uppercase">{{ $article->nom }}</h3>

                                {{-- DESCRIPTION ARTICLE --}}
                                <p class="card-text mb-2" style="height: 100px;">
                                    {{ substr($article->description, 0, 120) . '...' }}</p>

                                {{-- PRIX ARTICLE ---------------------------------------------------------------------------- --}}
                                @php $campagne = ifPromo($article->id) @endphp
                                @if ($campagne)
                                    {{-- PRIX ARTICLE SI PROMO EN COURS --------------------------- --}}
                                    <div class="card-text rounded mb-2" style="border: 1px solid rgb(255,225,64)">
                                        <p class="m-0"
                                            style="background: rgb(255,225,64);
background: radial-gradient(circle, rgba(252,235,145,1) 0%, rgba(255,225,64,1) 100%); color: black;">
                                            PROMO {{ $campagne->nom }}</p>

                                        @php $prixPromo = $article->prix - ($article->prix * $campagne->reduction / 100)@endphp
                                        <p class="m-0 px-1 fs-5"><del
                                                class="fs-5 text-secondary">{{ number_format($article->prix, 2, ',') }}
                                                €</del></p>
                                        <p class="m-0">
                                            <span class="fs-4"
                                                style="color: rgb(255,225,64)">{{ number_format($prixPromo, 2, ',') }}
                                                €</span>
                                            (- {{ $campagne->reduction }}%)
                                        </p>
                                        <p class="m">(la boîte de
                                            125
                                            g)
                                        </p>
                                    </div>
                                @else
                                    {{-- PRIX ARTICLE HORS PROMO --------------------------- --}}
                                    <p class="card-text m-0"><span class="fs-3">{{ $article->prix }} €</span> (boîte
                                        de
                                        125 g)
                                    </p>
                                @endif

                                {{-- NOTE ARTICLE --}}
                                <p class="fst-italic mb-3"><i class="fa-solid fa-star"></i> Note des clients : <span
                                        class="fw-bold">{{ $article->note_moyenne }} / 5</span> </p>

                                {{-- Bouton AJOUT AU PANIER --}}
                                <form method="post" action="{{ route('panier.ajouter', $article) }}">
                                    @csrf
                                    <input class="fs-4 text-end" type="number" name="quantite" value="1"
                                        min="1" max="{{ $article['stock'] }}">
                                    <input type="hidden" name="article" value="{{ $article }}">
                                    <button class="btn btn-lg btn-outline-warning"><i
                                            class="fa-solid fa-cart-plus p-0 m-0"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endif