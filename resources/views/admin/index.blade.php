@extends('layouts.app')
@section('content')
    <div class="my-3">
        <div class="accordion" id="accordionPanelsStayOpenExample">
            {{-- ___________________________________________________________________________________________________________ --}}
            {{-- 1 - CRÉATION D'ARTICLE' --}}
            <div class="accordion-item text-bg-dark">
                <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                    <button class="accordion-button text-bg-warning fs-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseFour">
                        CRÉATION D'UN NOUVEL ARTICLE
                    </button>
                </h2>


                <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse show"
                    aria-labelledby="panelsStayOpen-headingFour">
                    <div class="accordion-body">
                        <div class="row px-5">
                            <div class="card p-3 text-bg-light">
                                <form method="post" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    {{-- Nom du nouvel article --}}
                                    <div class="row">
                                        <div class="col-12 col-md-6 mb-3">
                                            <label class="form-label">NOM</label>
                                            <input class="form-control" name="nom" required>
                                        </div>

                                        {{-- Description du nouvel article --}}
                                        <div class="col-12 col-md-6 mb-3">
                                            <label class="form-label">DESCRIPTION</label>
                                            <textarea class="form-control" name="description" required></textarea>
                                        </div>

                                        {{-- Gamme du nouvel article --}}
                                        <div class="col-12 col-md-6 mb-3">
                                            <label class="form-label">GAMME</label>
                                            <select name="gamme_id" class="form-control" required>
                                                <option disabled selected value="">Sélectionner une gamme...</option>
                                                @foreach ($gammes as $gamme)
                                                    <option value="{{ $gamme['id'] }}">{{ $gamme['gamme'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- Image du nouvel article --}}
                                        <div class="col-12 col-md-6 mb-3">
                                            <label class="form-label">IMAGE</label>
                                            <input class="form-control" type="file" name="image" required>
                                        </div>

                                        {{-- Prix du nouvel article --}}
                                        <div class="col-12 col-md-6 mb-3">
                                            <label class="form-label">PRIX</label>
                                            <input class="form-control" type="number" name="prix" required>
                                        </div>

                                        {{-- Stock du nouvel article --}}
                                        <div class="col-12 col-md-6 mb-3">
                                            <label class="form-label">STOCK</label>
                                            <input class="form-control" type="number" name="stock" required>
                                        </div>

                                        {{-- Bouton de création du nouvel article --}}
                                        <div class="row">
                                            <div class="col mx-auto text-center">
                                                <button class="btn btn-warning fw-bold btn-lg mt-2">Créer le nouvel
                                                    article</button>
                                            </div>
                                        </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ___________________________________________________________________________________________________________ --}}
            {{-- 2 - GESTION DES ARTICLES EXISTANTS --}}

            <div class="accordion-item text-bg-dark">
                <h2 class="accordion-header" id="panelsStayOpen-headingfive">
                    <button class="accordion-button collapsed text-bg-info fs-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapsefive" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapsefive">
                        GESTION DES ARTICLES EXISTANTS
                    </button>
                </h2>

                <div id="panelsStayOpen-collapsefive" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingfive">

                    <div class="accordion-body">
                        <div class="row mx-auto p-3">
                            <table class="table table-hover table-light">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Prix</th>
                                        <th scope="col">Stock</th>
                                        <th scope="col">Note</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                @foreach ($articles as $article)
                                    <tbody>
                                        <tr>
                                            <td>{{ $article['nom'] }} </td>
                                            <td>{{ substr($article['description'], 0, 50) . '...' }}</td>
                                            <td><img src="{{ $article['image'] }}" style="width:50px;height:auto;"></td>
                                            <td>{{ $article['prix'] }}</td>
                                            <th>{{ $article['stock'] }}</td>
                                            <td>{{ $article['note_moyenne'] }}</td>
                                            <td>
                                                <form method="post" action="{{ route('articles.edit', $article) }}">
                                                    @method('get')
                                                    @csrf
                                                    <input type="hidden" name="article_id" value="{{ $article['id'] }}">
                                                    <button class="btn btn-info">Modifier</button>
                                                </form>
                                            </td>

                                            <td>
                                                <form method="post" action="{{ route('articles.destroy', $article) }}">
                                                    @method('delete')
                                                    @csrf
                                                    <input type="hidden" name="article_id" value="{{ $article['id'] }}">
                                                    <button class="btn btn-danger">Supprimer</button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('admin.admin-gammes')
    @include('admin.admin-campagnes')
    @include('admin.admin-users')
@endsection
