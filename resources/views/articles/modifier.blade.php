@extends('layouts.app')
@section('content')
@if (session()->has('message'))
<p class="alert alert-success">{{ session()->get('message') }}</p>
@endif
<div class="row">
<div class="col-6 offset-2">
<form method="post" method="post" action="{{ route('articles.update',$article) }}" enctype="multipart/form-data">
@method('put')
@csrf
<label class="control-label">Nom:</label>
<input class="form-control" name="nom" value="{{ $article->nom }}" required>

<label class="control-label">Description:</label>
<textarea class="form-control" name="description" required>
{{ $article->description }}
</textarea>


<select name="gamme_id" class="form-control">
    <option  selected value="{{$article->gamme['id']}}">{{$article->gamme['gamme']}}</option>
    @foreach ($gammes as $gamme)
        <option value="{{ $gamme['id'] }}">{{ $gamme['gamme'] }}</option>
    @endforeach

</select>

<label class="form-label">Image</label>
<img class="m-2" src="http://127.0.0.1:8000/{{ $article->image }}" style="width:150px; height:auto;">
<input class="form-control" type="file" name="image">


<label class="control-label">Prix:</label>
<input class="form-control" name="prix" value="{{ $article->prix }}" required>

<label class="control-label">Stock:</label>
<input class="form-control" name="stock" value="{{ $article->stock }}" required>
<button class="btn btn-primary">Modifier</button>
</form>
</div>
</div>
@endsection