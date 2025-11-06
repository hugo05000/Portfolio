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
                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <strong>{{ $p->libelle }}</strong>
                                <div class="text-muted small">{{ \Illuminate\Support\Str::limit($p->description, 180) }}</div>
                            </div>
                        </div>

                        @if(isset($p->photos) && $p->count() > 0)
                            <div class="row g-3">
                                @foreach($p->photos as $ph)
                                    <div class="col-6 col-md-3">
                                        <div class="card h-100">
                                            <img src="{{ asset('storage/'.$ph->source) }}"
                                                 class="card-img-top"
                                                 alt="{{ $ph->alt ?? $p->libelle }}"
                                                 style="object-fit: cover; height: 160px;">
                                            <div class="card-body p-2">
                                                <small class="text-muted d-block" title="{{ $ph->alt }}">{{ Str::limit($ph->alt, 40) }}</small>

                                                <form action="{{ route('admin.prestations.photos.destroy', $ph) }}"
                                                      method="POST"
                                                      class="mt-2 d-grid"
                                                      onsubmit="return confirm('Supprimer cette photo ?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-outline-danger">Supprimer</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div>
                        <form action="{{ route('prestations.destroy', $p) }}"
                              method="POST"
                              class="mt-2 d-grid"
                              onsubmit="return confirm('Supprimer cette prestation ?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Supprimer la prestation</button>
                        </form>
                    </div>
                    @if(!$loop->last) <hr> @endif
                @empty
                    <p class="text-muted mb-0">Aucune prestation pour le moment.</p>
                @endforelse
            </div>
        </div>

    </div>
@endsection
