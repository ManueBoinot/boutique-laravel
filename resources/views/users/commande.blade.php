@extends('layouts/app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-center p-3">Mes commandes</h1>
        <table class="table text-white fs-4">
            <thead>
                <tr>
                    <th scope="col">Numéro de commande</th>
                    <th scope="col">Date</th>
                    <th scope="col">Montant</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user->commandes as $commande)
                    <tr>
                        <td>{{ $commande->numero }}</td>
                        <td>{{ date('d-m-Y', strtotime($commande->created_at)) }}</td>
                        <td>{{ number_format($commande->prix, 2, ',') }} €</td>
                        <td><a href="{{ route('commande.show', $commande) }}">
                                <button type="submit" class="btn btn-outline-warning fs-5">
                                    {{ __('Détails') }}
                                </button></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
