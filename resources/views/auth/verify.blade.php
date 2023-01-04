@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Vérifier votre adresse email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un lien de confirmation vient d\'être envoyé à l\'adresse email fournie') }}
                        </div>
                    @endif

                    {{ __('Avant de continuer, merci de regarder vos emails pour trouver le lien de vérification') }}
                    {{ __('Si vous n\'avez pas reçu l\'email de confirmation') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Cliquez ici pour demander un nouvel envoi') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
