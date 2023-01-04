@extends('layouts.app');

@section('content')
    <div class="container">
        <div class="row bg-light">
            <div class="col">
                <h1>Nos Gammes</h1>
            </div>
        </div>

        <div class="row">
            <div class="col">
                @foreach ($gammes as $gamme)
                    <h2 style="display:inline-block;">{{ $gamme['gamme'] }}<h2>
            </div>
        </div>

        <div class="row">
               @foreach ($gamme->articles as $article)
            <div class="col-4 mt-2">
                <div class="card">
                    <img src="{{ $article['image'] }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article['nom'] }}</h5>
                        <p class="card-text">{{ $article['description'] }}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        @endforeach
 
    </div>
@endsection
