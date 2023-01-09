@extends('layouts/app')

@section('content')
    <h1 class="text-center p-3">Je modifie mes informations</h1>
    <form method="POST" action="{{ route('users.update', $user) }}">
        @csrf @method('put')

        <div class="row mb-3">
            <label for="nom" class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label>

            <div class="col-md-6">
                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom"
                    value="{{ $user->nom }}" required autocomplete="nom" autofocus>

                @error('nom')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="prenom" class="col-md-4 col-form-label text-md-end">{{ __('Prénom') }}</label>

            <div class="col-md-6">
                <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror"
                    name="prenom" value="{{ $user->prenom }}" required autocomplete="prenom" autofocus>

                @error('prenom')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Courriel') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ $user->email }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Valider !') }}
                </button>
            </div>
        </div>
    </form>

    <h1 class="text-center p-3">Je modifie mon mot de passe</h1>

    <form method="POST" action="{{ route('updatePassword', $user) }}"> @csrf @method('put')
        <div class="row mb-3">
            <label for="old_password" class="col-md-4 col-form-label text-md-end">{{ __('Ancien mot de passe') }}</label>

            <div class="col-md-6">
                <input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror"
                    name="old_password" required autocomplete="old-password">

                @error('old_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Nouveau mot de passe') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password-confirm"
                class="col-md-4 col-form-label text-md-end">{{ __('Nouveau mot de passe à confirmer') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">
            </div>
        </div>
        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Valider !') }}
                </button>
            </div>
        </div>
    </form>

    @if (count($user->adresses) < 2)
        <form method="POST" action="{{ route('adresses.store', $user) }}">
            @csrf
            <h1 class="text-center p-3">J'ajoute mon adresse</h1>

            <div class="row mb-3">
                <label for="rue" class="col-md-4 col-form-label text-md-end">{{ __('Rue') }}</label>

                <div class="col-md-6">
                    <input id="rue" type="text" class="form-control @error('rue') is-invalid @enderror"
                        name="rue" required autocomplete="rue">

                    @error('rue')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="code_postal" class="col-md-4 col-form-label text-md-end">{{ __('Code postal') }}</label>

                <div class="col-md-6">
                    <input id="code_postal" type="text" class="form-control @error('code_postal') is-invalid @enderror"
                        name="code_postal" required autocomplete="code_postal">

                    @error('code_postal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="commune" class="col-md-4 col-form-label text-md-end">{{ __('Commune') }}</label>

                <div class="col-md-6">
                    <input id="commune" type="text" class="form-control @error('commune') is-invalid @enderror"
                        name="commune" required autocomplete="commune">

                    @error('commune')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Valider !') }}
                    </button>
                </div>
            </div>
        </form>
    @endif

    <h1 class="text-center p-3">Mes adresses</h1>

    @foreach ($user->adresses as $adresse)
        <form method="POST" action="{{ route('adresses.update', $adresse) }}">
            @csrf @method('put')

            <div class="row mb-3">
                <label for="rue" class="col-md-4 col-form-label text-md-end">{{ __('Rue') }}</label>

                <div class="col-md-6">
                    <input id="rue" type="text" class="form-control @error('rue') is-invalid @enderror"
                        name="rue" value="{{ $adresse->rue }}" required autocomplete="rue">

                    @error('rue')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="code_postal" class="col-md-4 col-form-label text-md-end">{{ __('Code postal') }}</label>

                <div class="col-md-6">
                    <input id="code_postal" type="text"
                        class="form-control @error('code_postal') is-invalid @enderror"
                        value="{{ $adresse->code_postal }}" name="code_postal" required autocomplete="code_postal">

                    @error('code_postal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="commune" class="col-md-4 col-form-label text-md-end">{{ __('Commune') }}</label>

                <div class="col-md-6">
                    <input id="commune" type="text" class="form-control @error('commune') is-invalid @enderror"
                        value="{{ $adresse->commune }}" name="commune" required autocomplete="commune">

                    @error('commune')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Modifier') }}
                    </button>

                </div>
            </div>
        </form>

        <form action="{{ route('adresses.destroy', $adresse) }}" method="POST">
            @csrf @method('delete')
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-danger">
                    {{ __('Supprimer') }}
                </button>
            </div>
        </form>
    @endforeach
@endsection
