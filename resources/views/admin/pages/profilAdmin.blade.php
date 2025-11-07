@extends('admin.layout.appAdmin')

@section('contenu')
    <div class="container py-5">

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Erreurs :</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <ul class="nav nav-pills mb-4">
            <li class="nav-item"><button class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab-profil">Profil</button></li>
            <li class="nav-item"><button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-experiences">Expériences</button></li>
            <li class="nav-item"><button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-educations">Parcours scolaire</button></li>
            <li class="nav-item"><button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-competences">Compétences</button></li>
        </ul>

        <div class="tab-content">
            {{-- PROFIL --}}
            <div id="tab-profil" class="tab-pane fade show active">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <form action="{{ route('profil.update', $profil) }}" method="POST" enctype="multipart/form-data" class="row g-3">
                            @csrf
                            <div class="col-md-6">
                                <label class="form-label">Nom et prénom</label>
                                <input name="nom_prenom" class="form-control" value="{{ old('nom_prenom', $profil->nom_prenom) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Ville d'origine</label>
                                <input name="ville" class="form-control" value="{{ old('ville', $profil->ville) }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Date de naissance</label>
                                <input type="date" name="date_de_naissance" class="form-control" value="{{ old('date_de_naissance', optional($profil->date_de_naissance)->format('Y-m-d')) }}">
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">En-tête</label>
                                <input name="en_tete" class="form-control" value="{{ old('en_tete', $profil->en_tete) }}" placeholder="Poste actuel...">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Résumé</label>
                                <textarea name="resume" class="form-control" rows="4">{{ old('resume', $profil->resume) }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Photo</label>
                                <input type="file" name="photo" class="form-control" accept="image/*">
                                @if($profil->photo_source)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/'.$profil->photo_source) }}" alt="Photo" class="img-thumbnail" style="max-height:140px;">
                                    </div>
                                @endif
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary">Enregistrer</button>

                            </div>
                        </form>
                        <form action="{{ route('profil.delete', $profil) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer le profil ?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-outline-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- EXPERIENCES --}}
            <div id="tab-experiences" class="tab-pane fade">
                <div class="row g-4">
                    <div class="col-lg-5">
                        <div class="card shadow-sm h-100">
                            <div class="card-body">
                                <h5 class="mb-3">Ajouter une expérience</h5>
                                <form action="{{ route('experiences.store') }}" method="POST" class="row g-2">
                                    @csrf
                                    <div class="col-12"><input name="entreprise" class="form-control" placeholder="Entreprise" required></div>
                                    <div class="col-12"><input name="titre" class="form-control" placeholder="Intitulé de poste" required></div>
                                    <div class="col-12"><input name="localisation" class="form-control" placeholder="Localisation"></div>
                                    <div class="col-6"><label class="form-label">Début</label><input type="date" name="date_de_debut" class="form-control"></div>
                                    <div class="col-6"><label class="form-label">Fin</label><input type="date" name="date_de_fin" class="form-control"></div>
                                    <div class="col-6 form-check ms-2">
                                        <input type="checkbox" class="form-check-input" id="poste_actuel" name="poste_actuel">
                                        <label class="form-check-label" for="poste_actuel">Poste actuel</label>
                                    </div>
                                    <div class="col-12"><textarea name="description" class="form-control" rows="3" placeholder="Description..."></textarea></div>
                                    <div class="col-12"><button class="btn btn-primary w-100">Ajouter</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="mb-3">Liste des expériences</h5>
                                @forelse($experiences as $xp)
                                    <div class="my-4 border rounded p-3">
                                        <div class="row g-2">
                                            <form action="{{ route('experiences.update', $xp) }}" method="POST" class="col-12">
                                                @csrf
                                                <div class="row g-2">
                                                    <div class="col-md-6">
                                                        <input name="entreprise" class="form-control" placeholder="Nom de l'entreprise" value="{{ $xp->entreprise }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input name="titre" class="form-control" placeholder="Titre du poste" value="{{ $xp->titre }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input name="localisation" class="form-control" placeholder="Localisation" value="{{ $xp->localisation }}">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="date" name="date_de_debut" class="form-control" value="{{ optional($xp->date_de_debut)->format('Y-m-d') }}">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="date" name="date_de_fin" class="form-control" value="{{ optional($xp->date_de_fin)->format('Y-m-d') }}">
                                                    </div>
                                                    <div class="col-md-3 form-check ms-2 mt-2">
                                                        <input type="checkbox" class="form-check-input" name="poste_actuel" {{ $xp->poste_actuel ? 'checked' : '' }}>
                                                        <label class="form-check-label">Actuel</label>
                                                    </div>
                                                    <div class="col-12">
                                                        <textarea name="description" class="form-control" rows="2" placeholder="Description de l'expérience">{{ $xp->description }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="d-flex justify-content-end align-items-center gap-2 mt-3">
                                                    <button type="submit" class="btn btn-outline-primary">Mettre à jour</button>
                                                </div>
                                            </form>

                                            <div class="d-flex justify-content-end mt-2">
                                                <form action="{{ route('experiences.delete', $xp) }}" method="POST" onsubmit="return confirm('Supprimer cette expérience ?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger">Supprimer</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-muted mb-0">Aucune expérience pour le moment.</p>
                                @endforelse
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- EDUCATIONS --}}
            <div id="tab-educations" class="tab-pane fade">
                <div class="row g-4">
                    <div class="col-lg-5">
                        <div class="card shadow-sm h-100">
                            <div class="card-body">
                                <h5 class="mb-3">Ajouter une formation</h5>
                                <form action="{{ route('educations.store') }}" method="POST" class="row g-2">
                                    @csrf
                                    <div class="col-12"><input name="diplome" class="form-control" placeholder="Diplôme (ex: Master MIAGE)" required></div>
                                    <div class="col-12"><input name="ecole" class="form-control" placeholder="Établissement"></div>
                                    <div class="col-12"><input name="details" class="form-control" placeholder="Détails (optionnel)"></div>
                                    <div class="col-6"><input type="number" name="annee_debut" class="form-control" placeholder="Année début"></div>
                                    <div class="col-6"><input type="number" name="annee_fin" class="form-control" placeholder="Année fin"></div>
                                    <div class="col-12"><button class="btn btn-primary w-100">Ajouter</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="mb-3">Liste des formations</h5>
                                @forelse($educations as $ed)
                                    <div class="border rounded p-3 mb-3">
                                        <form action="{{ route('educations.update', $ed) }}" method="POST">
                                            @csrf
                                            <div class="row g-2">
                                                <div class="col-md-6">
                                                    <input name="diplome" class="form-control" value="{{ $ed->diplome }}" placeholder="Diplôme...">
                                                </div>
                                                <div class="col-md-6">
                                                    <input name="ecole" class="form-control" value="{{ $ed->ecole }}" placeholder="Établissement...">
                                                </div>
                                                <div class="col-12">
                                                    <input name="details" class="form-control" value="{{ $ed->details }}" placeholder="Détails...">
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" name="annee_debut" class="form-control" value="{{ $ed->annee_debut }}" placeholder="Année début...">
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" name="annee_fin" class="form-control" value="{{ $ed->annee_fin }}" placeholder="Année fin...">
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-end align-items-center gap-2 mt-3">
                                                <button type="submit" class="btn btn-outline-primary">Mettre à jour</button>
                                            </div>
                                        </form>

                                        <div class="d-flex justify-content-end mt-2">
                                            <form action="{{ route('educations.delete', $ed) }}" method="POST" onsubmit="return confirm('Supprimer cette formation ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger">Supprimer</button>
                                            </form>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-muted mb-0">Aucune formation pour le moment.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- COMPÉTENCES --}}
            <div id="tab-competences" class="tab-pane fade">
                <div class="row g-4">
                    <div class="col-lg-5">
                        <div class="card shadow-sm h-100">
                            <div class="card-body">
                                <h5 class="mb-3">Ajouter une compétence</h5>
                                <form action="{{ route('competences.store') }}" method="POST" class="row g-2">
                                    @csrf
                                    <div class="col-12"><input name="libelle" class="form-control" placeholder="Libellé (ex: Gestion applicative)" required></div>
                                    <div class="col-12"><input name="categorie" class="form-control" placeholder="Catégorie (ex: Compétences / Intérêts)"></div>
                                    <div class="col-12"><button class="btn btn-primary w-100">Ajouter</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="mb-3">Liste des compétences</h5>
                                @forelse($competences as $sk)
                                    <div class="border rounded p-3 mb-3">
                                        <form action="{{ route('competences.update', $sk) }}" method="POST">
                                            @csrf
                                            <div class="row g-2">
                                                <div class="col-md-6">
                                                    <input name="libelle" class="form-control" value="{{ $sk->libelle }}" placeholder="Compétence...">
                                                </div>
                                                <div class="col-md-6">
                                                    <input name="categorie" class="form-control" value="{{ $sk->categorie }}" placeholder="Catégorie...">
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-end align-items-center gap-2 mt-3">
                                                <button type="submit" class="btn btn-outline-primary">Mettre à jour</button>
                                            </div>
                                        </form>

                                        <div class="d-flex justify-content-end mt-2">
                                            <form action="{{ route('competences.delete', $sk) }}" method="POST" onsubmit="return confirm('Supprimer cette compétence ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger">Supprimer</button>
                                            </form>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-muted mb-0">Aucune compétence pour le moment.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
