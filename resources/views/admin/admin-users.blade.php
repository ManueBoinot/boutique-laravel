{{-- ___________________________________________________________________________________________________________ --}}
{{-- GESTION DES USERS --}}
<div class="mt-5">
    <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item text-bg-dark">
            <h2 class="accordion-header" id="panelsStayOpen-headingfive">
                <button class="accordion-button collapsed text-bg-info fs-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapsefive" aria-expanded="false"
                    aria-controls="panelsStayOpen-collapsefive">
                    GESTION DES UTILISATEURS
                </button>
            </h2>

            <div id="panelsStayOpen-collapsefive" class="accordion-collapse collapse"
                aria-labelledby="panelsStayOpen-headingfive">

                <div class="accordion-body">
                    <div class="row mx-auto p-3">
                        <table class="table table-hover table-light">
                            <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">NOM</th>
                                    <th scope="col">PRÉNOM</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">RÔLE</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>

                            @foreach ($users as $user)
                                <tbody>
                                    <tr>
                                        <td>{{ $user['id'] }} </td>
                                        <td>{{ $user['nom'] }}</td>
                                        <td>{{ $user['prenom'] }}</td>
                                        <th>{{ $user['email'] }}</td>
                                        <td>{{ $user->role->role }}</td>
                                        <td>
                                            <form method="post" action="{{ route('users.destroy', $user) }}">
                                                @method('delete')
                                                @csrf
                                                <input type="hidden" name="user" value="{{ $user['id'] }}">
                                                <button class="btn btn-danger">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
