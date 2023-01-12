@extends('layouts.app')
@section('content')
    <div class="card p-3 text-bg-light">
<h1 class="text-uppercase text-center mb-5">MODIFICATION DE LA CAMPAGNE " {{ $campagne->nom}} "</h1>
        <form method="post" action="{{ route('campagne.update', $campagne) }}">
            @csrf
            @method('put')
            {{-- Nom de la nouvelle campagne --}}
            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    <label for="inputNom" class="form-label">NOM DE LA CAMPAGNE</label>
                    <input type="text" class="form-control fs-3" id="inputNom" aria-describedby="nomHelp" name="nom"
                        value="{{ $campagne->nom }}">
                    <div id="nomHelp" class="form-text">(25 caractères maximum)</div>
                </div>

                {{-- Réduction de la nouvelle campagne --}}
                <div class="col-12 col-md-6 mb-3">
                    <label for="inputReduction" class="form-label">RÉDUCTION APPLIQUÉE (en
                        %)</label>
                    <input type="number" class="form-control fs-3" name="reduction" required id="inputReduction"
                        value="{{ $campagne->reduction }}">
                </div>
            </div>

            <div class="row">
                {{-- Date de début de la nouvelle campagne --}}
                <div class="col-12 col-md-6 d-flex mb-3">
                    <label class="form-label col-2 my-auto">DATE DE DÉBUT</label>
                    <input type="date" class="form-control fs-3" name="date_debut" value="{{ $campagne->date_debut }}"
                        required>
                </div>

                {{-- Date de fin de la nouvelle campagne --}}
                <div class="col-12 col-md-6 d-flex mb-3">
                    <label class="form-label col-2 my-auto">DATE DE FIN</label>
                    <input type="date" class="form-control fs-3" name="date_fin" value="{{ $campagne->date_fin }}" required>
                </div>
            </div>

            {{-- Sélection des articles de la nouvelle campagne de la nouvelle campagne --}}
            <div class="row mx-auto">
                <h5 class="text-center">Sélectionner les articles concernés par cette campagne :
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

            {{-- Bouton de création de la nouvelle campagne --}}
            <div class="row">
                <div class="col mx-auto text-center">
                    <button class="btn btn-warning fw-bold btn-lg mt-2" type="submit">Mettre à jour la
                        campagne</button>
                </div>
            </div>
        </form>
    </div>
@endsection
