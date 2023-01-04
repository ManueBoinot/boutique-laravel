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
                <div class="col-4 mt-2">
                    <div class="card">
                        <img src="{{ $article['image'] }}" class="card-img-top" style="max-height:350px; width:auto;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article['nom'] }}</h5>
                            <p class="card-text">{{ $article['description'] }}</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    @endsection
