{{-- AFFICHAGE DE 3 ARTICLES EN PROMO SI PROMO EN COURS SINON 3 ARTICLES RANDOM --}}
@if (isset($promo))
    <div class="row justify-content-center text-center my-5">
        <h1 style="color: #ffed8a">EN PROMOTION !</h1>

        @foreach ($promo->articles as $article)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="text-bg-dark border-secondary card mb-3"
                    style="max-width: 540px; box-shadow: 1px 1px 10px grey;">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img src="{{ $article->image }}" class="img-fluid rounded-start" alt="{{ $article->nom }}">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h3 class="card-title text-uppercase">{{ $article->nom }}</h3>
                                <p class="card-text">{{ $article->description }}</p>
                                <p class="card-text">{{ $article->prix }} € (boîte de 125 g)</p>
                                <p class="fst-italic mb-3"><i class="fa-solid fa-star"></i> Note des clients : <span
                                        class="fw-bold">{{ $article->note_moyenne }} / 5</span> </p>
                                <a href="#" class="btn btn-outline-light m-2" role="button"
                                    data-bs-toggle="button">Voir le produit</a>
                                <a class="btn btn-outline-warning m-2" href="#"><i
                                        class="fa-solid fa-cart-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @else

    <div class="row justify-content-center text-center my-5">
        <h1 style="color: #ffed8a">EN PROMOTION !</h1>

        @foreach ($articles as $article)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="text-bg-dark border-secondary card mb-3"
                    style="max-width: 540px; box-shadow: 1px 1px 10px grey;">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img src="{{ $article->image }}" class="img-fluid rounded-start" alt="{{ $article->nom }}">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h3 class="card-title text-uppercase">{{ $article->nom }}</h3>
                                <p class="card-text">{{ $article->description }}</p>
                                <p class="card-text">{{ $article->prix }} € (boîte de 125 g)</p>
                                <p class="fst-italic mb-3"><i class="fa-solid fa-star"></i> Note des clients : <span
                                        class="fw-bold">{{ $article->note_moyenne }} / 5</span> </p>
                                <a href="#" class="btn btn-outline-light m-2" role="button"
                                    data-bs-toggle="button">Voir le produit</a>
                                <a class="btn btn-outline-warning m-2" href="#"><i
                                        class="fa-solid fa-cart-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endif
