@extends('layouts.app');

@section('content')
    <div class="container">
        <div class="row bg-light">
            <div class="col">
                <h1>Nos Gammes</h1>
            </div>
        </div>


        @foreach ($gammes as $gamme)
            <div class="row">
                <div class="col">
                    <h2 style="display:inline-block;">{{ $gamme['gamme'] }}<h2>
                </div>
            </div>


            <div class="row">
                @foreach ($gamme->articles as $article)
                    <div class="col-4 mt-2 text-dark">
                        <div class="card">
                            <img src="{{ $article['image'] }}" class="card-img-top">
                            <div class="card-body">
                                <h3 class="card-title">{{ $article['nom'] }}</h3>
                                <p class="card-text fs-3">{{ $article['description'] }}</p>
                                <div>Stock: {{ $article['stock'] }} </div>
                                <form method="get" action="{{ route('panier')  }}" >
                                    @csrf
                                    <input type="hidden" name="article" value="{{ $article }}">
                                    <button class="btn btn-primary">Ajouter dans le panier </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach

    </div>
@endsection
