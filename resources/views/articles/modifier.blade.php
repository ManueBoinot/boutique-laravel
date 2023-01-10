@extends('layouts.app')
@section('content')
    @if (session()->has('message'))
        <p class="alert alert-success">{{ session()->get('message') }}</p>
    @endif
    <div class="row">
        <div class="col-6 offset-2">
            <form method="post" method="post" action="{{ route('articles.update', $article) }}">
                @method('put')
                @csrf
                <label class="control-label">Nom:</label>
                <input class="form-control" name="nom" value="{{ $article->nom }}" required>

                <label class="control-label">Description:</label>
                <textarea class="form-control" name="description" required>
{{ $article->description }}
</textarea>

                <label class="control-label">Prix:</label>
                <input class="form-control" name="prix" value="{{ $article->prix }}" required>

                <label class="control-label">Stock:</label>
                <input class="form-control" name="stock" value="{{ $article->stock }}" required>
                <button class="btn btn-primary">Modifier</button>
            </form>
        </div>
    </div>
@endsection
