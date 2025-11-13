@extends('admin.layout.appAdmin')

@section('contenu')
    <div class="container my-4">

        {{-- Messages --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Formulaire --}}
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form method="POST"
                      action="{{ route('prestations.store') }}"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Libellé <span class="text-danger">*</span></label>
                        <input type="text" name="libelle" class="form-control" value="{{ old('libelle') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea name="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Photos (optionnel)</label>
                        <input type="file"
                               name="photos_prestations[]"
                               class="form-control"
                               accept=".jpg,.jpeg,.png,.webp,.avif"
                               multiple>
                        <div class="form-text">Tu peux sélectionner plusieurs fichiers.</div>
                    </div>

                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>

        {{-- Liste des prestations + leurs photos --}}
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="mb-3">Prestations existantes</h5>

                @forelse($prestations as $p)
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">

                            {{-- En-tête : titre + bouton suppression presta --}}
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <h5 class="mb-1">{{ $p->libelle }}</h5>
                                    <p class="text-muted mb-0">
                                        {{ \Illuminate\Support\Str::limit($p->description, 100) }}
                                    </p>
                                </div>

                                <form action="{{ route('prestations.destroy', $p) }}"
                                      method="POST"
                                      onsubmit="return confirm('Supprimer cette prestation ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">
                                        Supprimer
                                    </button>
                                </form>
                            </div>

                            {{-- Formulaire d’édition --}}
                            <form action="{{ route('prestations.update', $p) }}"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Libellé</label>
                                        <input name="libelle"
                                               class="form-control"
                                               value="{{ old('libelle', $p->libelle) }}"
                                               required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Description</label>
                                        <textarea name="description"
                                                  class="form-control"
                                                  rows="3"
                                                  required>{{ old('description', $p->description) }}</textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Ajouter des photos</label>
                                        <input type="file"
                                               name="photos_prestations[]"
                                               class="form-control"
                                               accept="image/*"
                                               multiple>
                                        <div class="form-text">Tu peux sélectionner plusieurs fichiers.</div>
                                    </div>

                                    <div class="col-md-6 d-flex align-items-end justify-content-md-end">
                                        <button class="btn btn-primary w-100 w-md-auto mt-2 mt-md-0" type="submit">
                                            Mettre à jour
                                        </button>
                                    </div>
                                </div>
                            </form>

                            {{-- Galerie de photos --}}
                            @if($p->photos?->count())
                                <hr class="mt-4 mb-3">
                                <h6 class="mb-2">Photos</h6>

                                <div class="row g-3">
                                    @foreach($p->photos as $ph)
                                        <div class="col-6 col-md-3">
                                            <div class="card h-100">
                                                <img src="{{ asset('storage/'.$ph->source) }}"
                                                     class="card-img-top"
                                                     alt="{{ $ph->alt ?? $p->libelle }}"
                                                     style="object-fit: cover; height: 160px;">
                                                <div class="card-body p-2">
                                                    <small class="text-muted d-block"
                                                           title="{{ $ph->alt }}">
                                                        {{ \Illuminate\Support\Str::limit($ph->alt, 40) }}
                                                    </small>

                                                    <form action="{{ route('admin.prestations.photos.destroy', $ph) }}"
                                                          method="POST"
                                                          class="mt-2 d-grid"
                                                          onsubmit="return confirm('Supprimer cette photo ?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-outline-danger">
                                                            Supprimer
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                        </div>
                    </div>
                @empty
                    <p class="text-muted mb-0">Aucune prestation pour le moment.</p>
                @endforelse
            </div>
        </div>

    </div>
@endsection
