<div class="my-5">
    <div class="accordion" id="accordionPanelsStayOpenExample">
        {{-- ___________________________________________________________________________________________________________ --}}
        {{-- 1 - CRÉATION DE GAMMES --}}
        <div class="accordion-item text-bg-dark">
            <h2 class="accordion-header" id="panelsStayOpen-headingseven">
                <button class="accordion-button text-bg-warning fs-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseseven" aria-expanded="false"
                    aria-controls="panelsStayOpen-collapseseven">
                    CRÉATION D'UNE NOUVELLE GAMME
                </button>
            </h2>


            <div id="panelsStayOpen-collapseseven" class="accordion-collapse collapse show"
                aria-labelledby="panelsStayOpen-headingseven">
                <div class="accordion-body">
                    <div class="row px-5">
                        <div class="card p-3 text-bg-light">
                            <form class="d-flex align-items-center justify-content-center gap-4" method="post"
                                action="{{ route('gammes.store') }}">
                                @csrf
                                <label class="form-label text-uppercase m-0">Nom</label>
                                <input class="form-control w-50" name="gamme" required>
                                {{-- Bouton de création de la nouvelle gamme --}}
                                <button class="btn btn-warning fw-bold btn-lg" type="submit">Créer la nouvelle
                                    gamme</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>


            {{-- ___________________________________________________________________________________________________________ --}}
            {{-- 2 - GESTION DES GAMMES EXISTANTES --}}
            <div class="accordion-item text-bg-dark">
                <h2 class="accordion-header" id="panelsStayOpen-headingeight">
                    <button class="accordion-button collapsed text-bg-info fs-3" type="button"
                        data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseeight" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseeight">
                        GESTION DES GAMMES EXISTANTES
                    </button>
                </h2>

                <div id="panelsStayOpen-collapseeight" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingeight">

                    <div class="accordion-body">
                        {{-- Accordéon interne liste des GAMMES ---------------------------------------------- --}}
                        @foreach ($gammes as $gamme)
                            <div class="d-flex align-items-center justify-content-center gap-4 py-3 border-bottom w-50 mx-auto">
                                <h4 class="m-0 w-25">Gamme : <span class="text-uppercase">{{ $gamme['gamme'] }}</span></h4>

                                <form method="post" action="{{ route('gammes.edit', $gamme) }}">
                                    @method('get')
                                    @csrf
                                    <input type="hidden" name="gamme" value="{{ $gamme['id'] }}">
                                    <button class="btn btn-info">Modifier la gamme</button>
                                </form>

                                <form method="post" action="{{ route('gammes.destroy', $gamme) }}">
                                    @method('delete')
                                    @csrf
                                    <input type="hidden" name="gamme" value="{{ $gamme['id'] }}">
                                    <button class="btn btn-danger m-0">Supprimer</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
