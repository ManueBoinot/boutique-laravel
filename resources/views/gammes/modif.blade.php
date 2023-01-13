@extends('layouts.app')
@section('content')
    <div class="text-bg-dark w-50 mx-auto">
        <h1 class="text-uppercase text-center mb-3 text-info">MODIFICATION DE LA GAMME " {{ $gamme->gamme }} "</h1>
        <div class="row">
            <form class="p-3 border rounded text-center" method="post" action="{{ route('gammes.update', $gamme) }}">
                @method('put')
                @csrf
                <label class="control-label">
                    <h5 class="text-uppercase mb-3">Nom de la gamme</h5>
                </label>
                <input class="form-control fs-3 w-75 mx-auto text-center" name="gamme" value="{{ $gamme->gamme }}" required>


                {{-- Bouton de validation de modification de campagne --}}
                <div class="row mt-3">
                    <div class="col mx-auto text-center">
                        <button class="btn btn-info fw-bold btn-lg mt-2" type="submit">Mettre à jour la
                            gamme</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
