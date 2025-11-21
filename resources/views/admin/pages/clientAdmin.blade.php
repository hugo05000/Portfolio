@extends('admin.layout.appAdmin')

@section('contenu')
    <div class="container py-4">

        <h1 class="mb-4">Gestion des clients</h1>

        {{-- Messages flash --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Affichage des erreurs de validation --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <p class="mb-1"><strong>Attention :</strong> des erreurs sont survenues.</p>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- FORMULAIRE D'AJOUT DE CLIENT --}}
        <div class="card mb-4">
            <div class="card-header">
                <h2 class="h5 mb-0">Ajouter un nouveau client</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom du client <span class="text-danger">*</span></label>
                        <input
                            type="text"
                            name="nom"
                            id="nom"
                            class="form-control"
                            value="{{ old('nom') }}"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label for="lien" class="form-label">Lien (site web, page, etc.)</label>
                        <input
                            type="text"
                            name="lien"
                            id="lien"
                            class="form-control"
                            value="{{ old('lien') }}"
                            placeholder="https://..."
                        >
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">
                            Logo / image du client <span class="text-danger">*</span>
                        </label>
                        <input
                            type="file"
                            name="image"
                            id="image"
                            class="form-control"
                            accept="image/*"
                            required
                        >
                        <div class="form-text">
                            Formats acceptés : jpeg, png, jpg, gif, svg – max 4 Mo.
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Ajouter le client
                    </button>
                </form>
            </div>
        </div>

        {{-- LISTE DES CLIENTS EXISTANTS --}}
        <div class="card">
            <div class="card-header">
                <h2 class="h5 mb-0">Liste des clients</h2>
            </div>

            <div class="card-body p-0">
                @if($clients->isEmpty())
                    <p class="p-3 mb-0">Aucun client pour le moment.</p>
                @else
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead>
                            <tr>
                                <th>Logo</th>
                                <th>Nom</th>
                                <th>Lien</th>
                                <th class="text-end">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clients as $client)
                                <tr>
                                    <td style="width: 100px;">
                                        @if($client->image)
                                            <img
                                                src="{{ asset('storage/' . $client->image) }}"
                                                alt="{{ $client->nom }}"
                                                class="img-fluid"
                                                style="max-height: 60px;"
                                            >
                                        @else
                                            <span class="text-muted">Pas d'image</span>
                                        @endif
                                    </td>

                                    <td>
                                        {{ $client->nom }}
                                    </td>

                                    <td>
                                        @if($client->lien)
                                            <a href="{{ $client->lien }}" target="_blank" rel="noopener noreferrer">
                                                {{ $client->lien }}
                                            </a>
                                        @else
                                            <span class="text-muted">Aucun lien</span>
                                        @endif
                                    </td>

                                    <td class="text-end">
                                        {{-- Bouton pour afficher/masquer le formulaire d'édition --}}
                                        <button
                                            class="btn btn-sm btn-outline-secondary"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#edit-client-{{ $client->id }}"
                                            aria-expanded="false"
                                        >
                                            Modifier
                                        </button>

                                        {{-- Formulaire de suppression --}}
                                        <form
                                            action="{{ route('clients.destroy', $client) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Supprimer ce client ?');"
                                        >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                Supprimer
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                {{-- FORMULAIRE D'ÉDITION (collapse sous la ligne) --}}
                                <tr class="collapse" id="edit-client-{{ $client->id }}">
                                    <td colspan="4">
                                        <div class="border-top pt-3">
                                            <h3 class="h6 mb-3">Modifier le client</h3>
                                            <form
                                                action="{{ route('clients.update', $client) }}"
                                                method="POST"
                                                enctype="multipart/form-data"
                                            >
                                                @csrf
                                                {{-- NE PAS mettre @method('PUT') ici car ta route est en POST --}}

                                                <div class="row g-3">
                                                    <div class="col-md-4">
                                                        <label class="form-label" for="nom-{{ $client->id }}">
                                                            Nom <span class="text-danger">*</span>
                                                        </label>
                                                        <input
                                                            type="text"
                                                            name="nom"
                                                            id="nom-{{ $client->id }}"
                                                            class="form-control"
                                                            value="{{ old('nom', $client->nom) }}"
                                                            required
                                                        >
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="form-label" for="lien-{{ $client->id }}">
                                                            Lien
                                                        </label>
                                                        <input
                                                            type="text"
                                                            name="lien"
                                                            id="lien-{{ $client->id }}"
                                                            class="form-control"
                                                            value="{{ old('lien', $client->lien) }}"
                                                        >
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="form-label" for="image-{{ $client->id }}">
                                                            Nouvelle image (optionnel)
                                                        </label>
                                                        <input
                                                            type="file"
                                                            name="image"
                                                            id="image-{{ $client->id }}"
                                                            class="form-control"
                                                            accept="image/*"
                                                        >
                                                        <div class="form-text">
                                                            Laisser vide pour conserver l'image actuelle.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-3">
                                                    <button type="submit" class="btn btn-sm btn-success">
                                                        Enregistrer les modifications
                                                    </button>
                                                    <button
                                                        class="btn btn-sm btn-outline-secondary"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#edit-client-{{ $client->id }}"
                                                    >
                                                        Annuler
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection
