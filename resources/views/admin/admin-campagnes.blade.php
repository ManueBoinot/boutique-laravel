<div class="my-3">
    <div class="accordion" id="accordionPanelsStayOpenExample">
        {{-- ___________________________________________________________________________________________________________ --}}
        {{-- 1 - CRÉATION DE CAMPAGNE --}}
        <div class="accordion-item text-bg-dark">
            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                <button class="accordion-button text-bg-warning fs-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false"
                    aria-controls="panelsStayOpen-collapseOne">
                    CRÉATION D'UNE NOUVELLE CAMPAGNE
                </button>
            </h2>

            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                aria-labelledby="panelsStayOpen-headingOne">
                <div class="accordion-body">
                    <div class="row px-5">
                        <div class="card p-3 text-bg-light">

                            <form method="post" action="{{ route('campagne.store') }}">
                                @csrf
                                {{-- Nom de la nouvelle campagne --}}
                                <div class="row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label for="inputNom" class="form-label">NOM DE LA CAMPAGNE</label>
                                        <input type="text" class="form-control" id="inputNom"
                                            aria-describedby="nomHelp" name="nom">
                                        <div id="nomHelp" class="form-text">(25 caractères maximum)</div>
                                    </div>

                                    {{-- Réduction de la nouvelle campagne --}}
                                    <div class="col-12 col-md-6 mb-3">
                                        <label for="inputReduction" class="form-label">RÉDUCTION APPLIQUÉE (en
                                            %)</label>
                                        <input type="number" class="form-control" name="reduction" required
                                            id="inputReduction">
                                    </div>
                                </div>

                                <div class="row">
                                    {{-- Date de début de la nouvelle campagne --}}
                                    <div class="col-12 col-md-6 d-flex mb-3">
                                        <label class="form-label col-2 my-auto">DATE DE DÉBUT</label>
                                        <input type="date" class="form-control" name="date_debut" required>
                                    </div>

                                    {{-- Date de fin de la nouvelle campagne --}}
                                    <div class="col-12 col-md-6 d-flex mb-3">
                                        <label class="form-label col-2 my-auto">DATE DE FIN</label>
                                        <input type="date" class="form-control" name="date_fin" required>
                                    </div>
                                </div>

                                {{-- Sélection des articles de la nouvelle campagne de la nouvelle campagne --}}
                                <div class="row mx-auto">
                                    <h5 class="text-center">Sélectionner les articles concernés par cette campagne :
                                    </h5>
                                    @foreach ($articles as $article)
                                        <div class="col-3">
                                            <input type="checkbox" id="article{{ $article->id }}"
                                                name="article{{ $article->id }}" value="{{ $article->id }}">
                                            <label for="article{{ $article->id }}">{{ $article->nom }}</label>
                                        </div>
                                    @endforeach

                                </div>

                                {{-- Bouton de création de la nouvelle campagne --}}
                                <div class="row">
                                    <div class="col mx-auto text-center">
                                        <button class="btn btn-warning fw-bold btn-lg mt-2" type="submit">Créer la nouvelle
                                            campagne</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ___________________________________________________________________________________________________________ --}}
        {{-- 2 - GESTION DES CAMPAGNES EXISTANTES --}}
        <div class="accordion-item text-bg-dark">
            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                <button class="accordion-button collapsed text-bg-info fs-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                    aria-controls="panelsStayOpen-collapseTwo">
                    GESTION DES CAMPAGNES EXISTANTES
                </button>
            </h2>

            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                aria-labelledby="panelsStayOpen-headingTwo">

                <div class="accordion-body">
                    {{-- Accordéon interne liste des campagnes ---------------------------------------------- --}}
                    @foreach ($campagnes as $campagne)
                        <div class="accordion accordion-flush border" id="accordionFlushExample">
                            <div class="accordion-item">

                                {{-- HEADER accordéon liste des campagnes --}}
                                <h2 class="accordion-header" id="flush-heading{{ $loop->iteration }}">
                                    <button class="accordion-button text-bg-secondary fs-3 collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $loop->iteration }}"
                                        aria-expanded="false" aria-controls="flush-collapse{{ $loop->iteration }}">
                                        <h3 class="me-3 col-4">Campagne : <span
                                                class="text-uppercase text-info">{{ $campagne->nom }}</span>
                                        </h3>
                                        <h3 class="me-3 col-3">Du <span
                                                class="text-info">{{ date('d-m-Y', strtotime($campagne->date_debut)) }}</span>
                                            au
                                            <span
                                                class="text-info">{{ date('d-m-Y', strtotime($campagne->date_fin)) }}</span>
                                        </h3>
                                        <h3 class="col-4">Réduction appliquée : <span
                                                class="fs-2 text-info">-{{ $campagne->reduction }}%</span>
                                        </h3>
                                    </button>
                                </h2>

                                {{-- Liste des articles de la campagne --}}
                                <div id="flush-collapse{{ $loop->iteration }}" class="accordion-collapse collapse"
                                    aria-labelledby="flush-heading{{ $loop->iteration }}"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body text-bg-dark">
                                        <div class="row mx-auto p-3">
                                            <h5>Articles concernés par la campagne <span
                                                    class="text-info text-uppercase">{{ $campagne->nom }}</span></h5>
                                            <table class="table table-hover table-dark">
                                                <thead class="text-uppercase">
                                                    <tr>
                                                        <th scope="col">Nom</th>
                                                        <th scope="col">Description</th>
                                                        <th scope="col">Image</th>
                                                        <th scope="col">Prix</th>
                                                        <th scope="col">Stock</th>
                                                        <th scope="col">Note</th>
                                                    </tr>
                                                </thead>

                                                @foreach ($campagne->articles as $article)
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $article['nom'] }} </td>
                                                            <td>{{ substr($article['description'], 0, 50) . '...' }}
                                                            </td>
                                                            <td><img src="{{ $article['image'] }}"
                                                                    style="width:50px; height:auto;">
                                                            </td>
                                                            <td>{{ $article['prix'] }}</td>
                                                            <td>{{ $article['stock'] }}</td>
                                                            <td>{{ $article['note_moyenne'] }}</td>
                                                        </tr>
                                                    </tbody>
                                                @endforeach
                                            </table>
                                        </div>

                                        {{-- BOUTON DE MODIFICATION ET SUPPRESSION DE CAMPAGNE --}}
                                        <div class="d-flex justify-content-end gap-3">
                                            <form method="post" action="{{ route('campagne.edit', $campagne) }}">
                                                @method('get')
                                                @csrf
                                                <input type="hidden" name="campagne_id"
                                                    value="{{ $campagne->id }}">
                                                <button class="btn btn-lg btn-info mx-2" title="Modifier cette campagne">Modifier la campagne</button>
                                            </form>

                                            <form method="post" action="{{ route('campagne.destroy', $campagne) }}">
                                                @method('delete')
                                                @csrf
                                                <input type="hidden" name="campagne_id"
                                                    value="{{ $campagne->id }}">
                                                <button class="btn btn-lg btn-danger" title="Supprimer cette campagne">Supprimer la campagne</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>
