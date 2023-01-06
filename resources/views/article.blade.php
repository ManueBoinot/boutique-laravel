@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-bg-dark border-secondary rounded" style="box-shadow: 1px 1px 10px grey;">
            <div class="row g-0">
                {{-- Image de l'article ---------------------------- --}}
                <div class="col-md-5">
                    <img src="{{ $article->image }}" class="img-fluid rounded-start" alt="{{ $article->nom }}">
                </div>
                <div class="col-md-7 p-5">
                    {{-- Nom de l'article ---------------------------- --}}
                    <div class="col">
                        <h3 class="text-uppercase fs-1 mb-4" style="color: #ffe140;">{{ $article->nom }}</h3>
                    </div>
                    {{-- Description de l'article ---------------------------- --}}
                    <div class="col">
                        <p class="fs-4 mb-4">{{ $article->description }}</p>
                    </div>
                    <div class="col">
                        <p class="fst-italic fs-4 mb-3"><i
                                class="fa-solid fa-star fs-4"></i> Note des clients : <span
                                class="fs-2 fw-bold">{{ $article->note_moyenne }} / 5</span> </p>
                    </div>
                    {{-- Prix de l'article ---------------------------- --}}
                    <div class="col">
                        <p class="fs-4 mb-3"><span class="fs-1 fw-bold">{{ $article->prix }} €</span> TTC <span
                                class="fst-italic">(boîte de 125 g)</span></p>
                    </div>
                    {{-- Ajout au panier ---------------------------- --}}
                    <div class="col">
                        <form action="" method="POST">
                            <button class="btn btn-lg btn-outline-warning m-2" href="#"><i
                                    class="fa-solid fa-cart-plus"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
