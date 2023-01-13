@extends('layouts.app')

@section('content')

    <script>
        function calcul() {
            total_produit = document.getElementById('total-produit').innerHTML;
            var e = document.getElementById("livraison");
            var livraison = e.value;
            document.getElementById('frais-livraison').innerHTML = livraison;
            var total_general = parseInt(total_produit) + parseInt(livraison);

            document.getElementById('total-general').innerHTML = total_general;
            document.getElementById('total').value = total_general;

            if (total_produit != 0) {
                document.getElementById('valider').style.visibility = 'visible';
            } else {
                document.getElementById('valider').style.visibility = 'hidden';
            }

        }
    </script>

    <div class="container">
        <!-- Initialisation du total général à 0 -->
        @php $total = 0 @endphp

        @if (session()->has('panier'))
            <h1 class="text-center py-2" style="color: #ffe140">VOTRE PANIER</h1>

            <div class="row">
                <div class="table-responsive shadow mb-3 fs-3 text">
                    <table class="table table-hover bg-white mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Produit</th>
                                <th scope="col" class="text-end">Prix</th>
                                <th scope="col" class="text-end">Quantité</th>
                                <th scope="col" class="text-end">Total</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>

                        <tbody>
                            <!-- On parcourt les produits du panier en session : session('panier') -->
                            @foreach (session('panier') as $cle => $article)
                                <!-- On incrémente le total général par le total de chaque produit du panier -->
                                @php $total += $article['prix'] * $article['quantite'] @endphp
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        <strong><a href="{{ route('articles.show', $cle) }}"
                                                title="Afficher le produit">{{ $article['nom'] }}</a></strong>
                                    </td>

                                    <td class="text-end">{{ $article['prix'] }} €
                                    </td>

                                    <!-- Le formulaire de mise à jour de la quantité -->
                                    <td class="text-end">
                                        <form class="d-flex justify-content-end" method="POST"
                                            action="{{ route('panier.ajouter', $cle) }}" class="form-inline d-inline-block">
                                            {{ csrf_field() }}
                                            <input type="number" name="quantite" placeholder="Quantité ?"
                                                value="{{ $article['quantite'] }}" class="form-control fs-5"
                                                style="width: 80px">
                                            <input type="submit" class="btn btn-warning ms-2" value="Actualiser" />
                                        </form>
                                    </td>

                                    <!-- Le total du produit = prix * quantité -->
                                    <td class="text-end">
                                        {{ $article['prix'] * $article['quantite'], 2, ',' }} €
                                    </td>

                                    <!-- Le Lien pour retirer un produit du panier -->
                                    <td class="text-center">
                                        <a href="{{ route('panier.supprimer', $cle) }}" class="btn btn-danger fw-bold"
                                            title="Retirer le produit du panier">X</a>
                                    </td>
                                </tr>
                            @endforeach

                            <!-- On affiche total produits -->
                            <tr colspan="2" class="text-end">
                                <td colspan="4">Montant total TTC</td>
                                <td colspan="1">
                                    <strong id="total-produit">{{ $total }} €</strong>
                                </td>
                                <td colspan="1"></td>
                            </tr>

                            <!-- frais de livraison -->
                            <tr colspan="2" class="text-end">
                                <td colspan="4">Frais de livraison</td>
                                <td colspan="1">
                                    <span id="frais-livraison">0</span> €
                                </td>
                                <td colspan="1"></td>
                            </tr>

                            <tr colspan="2" class="text-end">
                                <td colspan="4">Net à payer TTC</td>
                                <td colspan="1">
                                    <!-- On affiche total général -->
                                    <strong id="total-general">{{ $total }} €</strong>
                                </td>
                                <td colspan="1"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Lien pour vider le panier -->
            <div class="row">
                <div class="col text-end">
                    <a class="btn btn-danger" href="{{ route('panier.vider') }}"
                        title="Retirer tous les produits du panier">Vider
                        le panier</a>
                </div>
            </div>

            @auth
                <div class="row">
                    <h2 style="color: #ffe140">CHOIX DE LA LIVRAISON</h2>
                    <div class="row">
                        <form method="post" action="{{ route('commande.store') }}">
                            @csrf
                            <input id="total" type="hidden" name="total" value="{{ $total }}">

                            @if (count($user->adresses) > 0)
                                {{-- CHOIX MODE DE LIVRAISON --}}
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <select name="livraison" required class="form-control mt-2" id="livraison"
                                            onchange="calcul()">
                                            <option selected disabled value="0">Sélectionnez le mode livraison...</option>
                                            <option value="10">Livraison à domicile (10 €)</option>
                                            <option value="5">Livraison dans un point-relais (5 €)</option>
                                            <option value="15">Livraison express (15 €)</option>
                                        </select>
                                    </div>

                                    {{-- CHOIX ADRESSE DE LIVRAISON --}}
                                    <div class="col-12 col-md-6">
                                        <select name="adresse" class="form-control mt-2">
                                            <option selected disabled>Sélectionnez l'adresse de livraison...</option>
                                            @foreach ($user->adresses as $adresse)
                                                <option value="{{ $adresse['id'] }}">{{ $adresse['rue'] }},
                                                    {{ $adresse['code_postal'] }},
                                                    {{ $adresse['commune'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- BOUTON VALIDATION DE LIVRAISON --}}
                                <div class="row text-center">
                                    <div class="col">
                                        <button id="valider" class="btn btn-success mt-2" type="submit"
                                            style="visibility:hidden;">Valider le
                                            choix de livraison</button>
                                    </div>
                                </div>
                            @else
                                <div class="alert alert-danger">Veuillez renseigner au moins une adresse de livraison</div>
                            @endif
                        </form>
                    </div>
                </div>
            @endauth
        @else
            <div class="alert alert-info">Aucun produit au panier</div>
        @endif

        @guest
            <div class="alert alert-info">Pour continuer, connectez-vous</div>
        @endguest

    </div>
@endsection
