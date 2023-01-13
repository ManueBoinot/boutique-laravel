@extends('layouts/app')

@section('content')
    <div class="container-fluid">
        <div class="row">
          <div class="col-12"><h1 class="text-center text-uppercase p-3"style="color: #ffe140">commande n°{{ $commande->numero }} du {{ date('d-m-Y', strtotime($commande->created_at)) }}</h1></div>

            <table class="table text-white fs-4 m-3">
                <thead>
                    <tr>
                        <th scope="col" class="text-uppercase">Produits</th>
                        <th scope="col" class="text-uppercase text-end">Prix unitaire</th>
                        <th scope="col" class="text-uppercase text-end">Quantité</th>
                        <th scope="col" class="text-uppercase text-end">Prix total TTC</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($commande->articles as $article)
                        <tr>
                            <td>{{ $article->nom }}</td>
                            <td class="text-end">{{ number_format($article->prix, 2, ',', ' ') }} €</td>
                            <td class="text-end">{{ $article->pivot->quantite }}</td>
                            <td class="text-end">{{ number_format($article->prix * $article->pivot->quantite, 2, ',', ' ') }} €</td>
                        </tr>
                        @php $total+=$article->prix*$article->pivot->quantite @endphp
                    @endforeach
                </tbody>

            </table>
            <p class="fs-4 text-end m-0">Frais de livraison :
                {{ number_format($commande->prix - $total, 2, ',', ' ') }} €</p>
            <p class="fs-3 text-end m-0">Montant total TTC : {{ number_format($commande->prix, 2, ',', ' ') }} €
            </p>
        </div>
    </div>
@endsection
