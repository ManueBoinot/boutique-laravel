@extends('layouts.app');

@section('content')
    <div class="container">
        <div class="row bg-light">
            <div class="col">
                <h1>Nos chocolats (par ordre alphabetique)</h1>
            </div>
        </div>
        <div class="row">
            @foreach ($articles as $article)
                <div class="col-4 mt-2 text-dark fs-2">
                    <div class="card">
                        <img src="{{ $article['image'] }}" class="card-img-top" style="max-height:350px; width:auto;">
                        <div class="card-body fs-2">
                            <h3 class="card-title">{{ $article['nom'] }}</h3>
                            <p class="card-text fs-3">{{ $article['description'] }}</p>
                            <div>Stock: {{ $article['stock'] }} </div>
                            <form method="post" action="{{ route('panier.ajouter', $article)  }}" >
                                @csrf
                                <input class="form-control fs-2" type="number" name="quantite" value="1" min="1"  max="{{ $article['stock'] }} ">
                                <input type="hidden" name="article" value="{{ $article }}">
                                <button class="btn btn-primary">Ajouter dans le panier </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    @endsection
