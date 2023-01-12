@extends('layouts.app')
@section('content')
    <div class="text-bg-dark">
        <h1 class="text-uppercase text-center mb-3 text-info">MODIFICATION DE LA CAMPAGNE " {{ $campagne->nom }} "</h1>
        <form class="p-3 border rounded" method="post" action="{{ route('campagne.update', $campagne) }}">
            @csrf
            @method('put')

            {{-- Nouveau nom de la campagne --}}
            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    <label for="inputNom" class="form-label fw-bold fs-4 text-info">NOM DE LA CAMPAGNE</label>
                    <input type="text" class="form-control fs-3" id="inputNom" aria-describedby="nomHelp"
                        name="nom" value="{{ $campagne->nom }}">
                    <div id="nomHelp" class="form-text">(25 caractères maximum)</div>
                </div>

                {{-- Nouvelle réduction de la campagne --}}
                <div class="col-12 col-md-6 mb-3">
                    <label for="inputReduction" class="form-label fw-bold fs-4 text-info">RÉDUCTION APPLIQUÉE (en
                        %)</label>
                    <input type="number" class="form-control fs-3" name="reduction" required id="inputReduction"
                        value="{{ $campagne->reduction }}">
                </div>
            </div>

            {{-- Nouvelle date de début de la nouvelle campagne --}}
            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    <label class="form-label my-auto fw-bold fs-4 text-info">DATE DE DÉBUT</label>
                    <input type="date" class="form-control fs-3" name="date_debut" value="{{ $campagne->date_debut }}"
                        required>
                </div>

                {{-- Nouvelle date de fin de la nouvelle campagne --}}
                <div class="col-12 col-md-6 mb-3">
                    <label class="form-label my-auto fw-bold fs-4 text-info">DATE DE FIN</label>
                    <input type="date" class="form-control fs-3" name="date_fin" value="{{ $campagne->date_fin }}"
                        required>
                </div>
            </div>

            {{-- Sélection des nouveaux articles de la campagne --}}
            <div class="row mx-auto mt-3 border rounded p-3">
                <h5 class="text-center fw-bold fs-4 text-info mb-4">Sélectionner les articles concernés par cette campagne :
                </h5>
                @foreach ($articles as $article)
                    <div class="col-3">
                        <input type="checkbox" id="article{{ $article->id }}" name="article{{ $article->id }}"
                            value="{{ $article->id }}"
                            @foreach ($campagneArticlesIds as $id) @if ($id->article_id == $article->id) checked @break @endif @endforeach>
                        <label class="fs-4" for="article{{ $article->id }}">{{ $article->nom }}</label>
                    </div>
                @endforeach
            </div>

            {{-- Bouton de validation de modification de campagne --}}
            <div class="row">
                <div class="col mx-auto text-center">
                    <button class="btn btn-info fw-bold btn-lg mt-2" type="submit">Mettre à jour la
                        campagne</button>
                </div>
            </div>
        </form>
    </div>
@endsection
