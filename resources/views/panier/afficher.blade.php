@extends('layouts.app')

@section('content')
<script>
function calcul(){
    total_produit = document.getElementById('total-produit').innerHTML; 
    document.getElementById('frais-livraison').innerHTML =total_produit;
    var e = document.getElementById("livraison");
    var livraison = e.value;
    document.getElementById('frais-livraison').innerHTML= livraison;
    var total_general = +total_produit + +livraison;

   document.getElementById('total-general').innerHTML = total_general;
   document.getElementById('total').value = total_general;

   if (total_produit!=0){
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
            <h1>Mon panier</h1>
            <div class="table-responsive shadow mb-3 fs-3 text">
                <table class="table table-bordered table-hover bg-white mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Produit</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Total</th>
                            <th>Opérations</th>
                        </tr>
                    </thead>
                    <tbody>
                      



                        <!-- On parcourt les produits du panier en session : session('panier') -->
                        @foreach (session('panier') as $cle => $article)
                            <!-- On incrémente le total général par le total de chaque produit du panier -->
                            @php $total += $article['prix'] * $article['quantite'] @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <strong><a href="{{ route('panier.afficher', $cle) }}"
                                            title="Afficher le produit">{{ $article['nom'] }}</a></strong>
                                </td>
                                <td>{{ $article['prix'] }} €</td>
                                <td>
                                    <!-- Le formulaire de mise à jour de la quantité -->
                                    <form method="POST" action="{{ route('panier.ajouter', $cle) }}"
                                        class="form-inline d-inline-block">
                                        {{ csrf_field() }}
                                        <input type="number" name="quantite" placeholder="Quantité ?"
                                            value="{{ $article['quantite'] }}" class="form-control mr-2 fs-2"
                                            style="width: 80px">
                                        <input type="submit" class="btn btn-primary" value="Actualiser" />
                                    </form>
                                </td>
                                <td>
                                    <!-- Le total du produit = prix * quantité -->
                                    {{ $article['prix'] * $article['quantite'] }} €
                                </td>
                                <td>
                                    <!-- Le Lien pour retirer un produit du panier -->
                                    <a href="{{ route('panier.supprimer', $cle) }}" class="btn btn-outline-danger"
                                        title="Retirer le produit du panier">Retirer</a>
                                </td>
                            </tr>
                        @endforeach
                        <tr colspan="2">
                            <td colspan="4">Total Produits:</td>
                            <td colspan="2">
                                <!-- On affiche total général -->
							
                                <strong id="total-produit">{{ $total }}</strong><strong>€</strong>
            
                            </td>
                        </tr>

                        <tr colspan="2">
                            <td colspan="4">Frais de livraison:</td>
                            <td colspan="2">
                                <!-- frais de livraison -->
						
                
                                <strong id="frais-livraison">0</strong><strong>€</strong>
                            </td>
                        </tr>

                        <tr colspan="2">
                            <td colspan="4">Total Général:</td>
                            <td colspan="2">
                                <!-- On affiche total général -->
								{{-- @php session()->put('total', $total) @endphp --}}
                           
                                <strong id="total-general">{{ $total }}</strong><strong>€</strong>
                            </td>
                        </tr>


                    </tbody>

                </table>
            </div>

            <!-- Lien pour vider le panier -->
            <a class="btn btn-danger" href="{{ route('panier.vider') }}" title="Retirer tous les produits du panier">Vider
                le panier</a>


                @auth
                <form method="post" action="{{ route('commande.store') }}">
                    @csrf
    
                    <input id="total" type="hidden" name="total" value="{{ $total }}">

                    @if (count($user->adresses)>0)
                    <select name="adresse" class="form-control mt-2">
    
                       <option selected disabled>Sélectionnez...</option>
                        @foreach ($user->adresses as $adresse)
                            <option value="{{ $adresse['id'] }}">{{ $adresse['rue'] }}, {{ $adresse['code_postal']}}, {{$adresse['commune']}}</option>
                        @endforeach
    
                    </select>
                    <select name="livraison" required class="form-control mt-2" id="livraison" onchange="calcul()"">
                        <option selected disabled value="0">Sélectionnez...</option>
                        <option value="10">Livraison à domicile 10€</option>
                        <option value="5">Livraison dans un point relais 5€</option>
                        <option value="15">Livraison expresse 15€</option>
                    </select>
                    <button id="valider" class="btn btn-success mt-2" type="submit" style="visibility:hidden;">Valider</button>
                </form>

                    @else
                    <div class="alert alert-danger">Veuillez renseigner au moins une adresse de livraison</div>
                    @endif
   

    
    
            @endauth
    

        @else
            <div class="alert alert-info">Aucun produit au panier</div>
        @endif

        @guest
            <div class="alert alert-info">Pour continuer, Connectez vous</div>
        @endguest


    </div>

@endsection
