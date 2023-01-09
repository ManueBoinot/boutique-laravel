@extends('layouts/app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-center p-3">Détails des commandes</h1>

        <p class="fs-4 text-center m-0">Numéro de commande : {{ $commande->numero }}</p>
        <p class="fs-4 text-center m-0">Date de la commande : {{ $commande->created_at }}</p>
        <p class="fs-4 text-center m-0">Coût de la commande : {{ number_format($commande->prix, 2, ',', ' ') }} €</p>
        



        <table class="table text-white fs-4 m-3">
            <thead>
              <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prix</th>
                <th scope="col">Quantité</th>
                <th scope="col">Coût total</th>
              </tr>
            </thead>
            <tbody>
                @php 
                    $total=0
                @endphp
              @foreach ($commande->articles as $article)
                <tr>
                <td>{{ $article->nom }}</td>
                <td>{{ number_format($article->prix, 2, ',', ' ') }} €</td>
                <td>{{ $article->pivot->quantite }}</td>
                <td>{{ number_format($article->prix*$article->pivot->quantite, 2, ',', ' ') }} €</td>
              </tr>
              @php $total+=$article->prix*$article->pivot->quantite @endphp
              @endforeach
            </tbody>
            
          </table>
          <p class="fs-4 text-center m-0">Frais de livraison :
            {{ number_format($commande->prix-$total, 2, ',', ' ') }} €</p>

    </div>
@endsection