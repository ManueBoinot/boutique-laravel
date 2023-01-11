@extends('layouts.app')
@section('content')
    <div>
        <h2 class="text-light">Création d'un article:</h2>

        <div class="card text-black">
            <form method="post" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                @csrf
                <label class="form-label">Nom:</label>
                <input class="form-control" name="nom" required>

                <label class="form-label">Description:</label>
                <textarea class="form-control" name="description" required></textarea>
                <label class="form-label">Gamme:</label>


                <select name="gamme_id" class="form-control" required>
                    <option disabled selected value="">Sélectionnez...</option>
                    @foreach ($gammes as $gamme)
                        <option value="{{ $gamme['id'] }}">{{ $gamme['gamme'] }}</option>
                    @endforeach

                </select>

                <label class="form-label">Image</label>
                <input class="form-control" type="file" name="image" required>
                <label class="form-label">Prix:</label>
                <input class="form-control" type="number" name="prix" required>

                <label class="from-label">Stock:</label>
                <input class="form-control" type="number" name="stock" required>

                <button class="btn btn-primary">Enregistrer</button>

            </form>
        </div>

        <h2>Articles:</h2>
        <table class="table bg-light table-striped">
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Image</th>
                <th>Prix</th>
                <th>Stock</th>
                <th>Note</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article['nom'] }} </td>
                    <td>{{ $article['description'] }}</td>
                    <td><img src="{{ $article['image'] }}" style="width:50px;height:auto;"></td>
                    <td>{{ $article['prix'] }}</td>
                    <th>{{ $article['stock'] }}</td>
                    <td>{{ $article['note_moyenne'] }}</td>
                    <td>
                        <form method="post" action="{{ route('articles.edit', $article) }}">
                            @method('get')
                            @csrf
                            <input type="hidden" name="article_id" value="{{ $article['id'] }}">
                            <button class="btn btn-primary">Modifier</button>
                        </form>
                    </td>

                    <td>
                        <form method="post" action="{{ route('articles.destroy', $article) }}">
                            @method('delete')
                            @csrf
                            <input type="hidden" name="article_id" value="{{ $article['id'] }}">
                            <button class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </table>
    </div>
    @include('admin.admin-campagnes')
@endsection
