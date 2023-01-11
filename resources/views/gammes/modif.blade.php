@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-6 offset-2">
            <form method="post" method="post" action="{{ route('gammes.update', $gamme) }}">
                @method('put')
                @csrf
                <label class="control-label">Nom de la gamme:</label>
                <input class="form-control" name="gamme" value="{{ $gamme->gamme }}" required>
                <button class="btn btn-primary">Modifier</button>
            </form>
        </div>
    </div>
@endsection
