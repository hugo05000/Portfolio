@extends('layout.app')

@section('title')
    Hugo MARCEAU - Profil
@endsection

@section('header')
    @include('layout.header', ['titre' => 'Mon profil', 'description' => 'Mes activités, mon parcours, mes passions...'])
@endsection

@section('contenu')

    @php
        // Sécurités + calculs
        $birth = $profil?->date_de_naissance;
        $age = $birth ? \Carbon\Carbon::parse($birth)->age : null;

        // Groupes de compétences
        $competencesList = ($competences ?? collect())->where('categorie', 'Compétences');
        $interetsList    = ($competences ?? collect())->where('categorie', 'Intérêts');

        // Si aucune catégorie exacte n'existe, on répartit par défaut
        if($competencesList->isEmpty() && $interetsList->isEmpty()) {
            $half = ceil(($competences ?? collect())->count() / 2);
            $competencesList = ($competences ?? collect())->take($half);
            $interetsList    = ($competences ?? collect())->skip($half);
        }
    @endphp

    <div class="container py-5">
        <div class="row g-4">
            <!-- Colonne gauche : Carte identité -->
            <div class="col-12 col-lg-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            @if(!empty($profil?->photo_source))
                                <img src="{{ asset('storage/'.$profil->photo_source) }}"
                                     alt="Photo de profil"
                                     class="rounded-circle border"
                                     style="width:120px;height:120px;object-fit:cover;">
                            @else
                                <div class="rounded-circle bg-light border d-inline-flex align-items-center justify-content-center" style="width:120px;height:120px;">
                                <span class="fw-bold">
                                    {{ Str::of($profil?->nom_prenom ?? 'Hugo MARCEAU')->split('/\s+/')->map(fn($p)=>mb_substr($p,0,1))->implode('') ?: 'HM' }}
                                </span>
                                </div>
                            @endif
                        </div>
                        <h3 class="h4 text-center mb-1">{{ $profil?->nom_prenom ?? 'Hugo MARCEAU' }}</h3>
                        <p class="text-center text-muted mb-3">{{ $profil?->en_tete ?? 'Aucune donnée disponible' }}</p>

                        <div class="row g-2 mb-3">
                            <div class="col-12">
                                <div class="d-flex align-items-center">
                                    <span class="me-2">📍</span>
                                    <span>{{ $profil?->ville ?? 'Aucune ville disponible' }}</span>
                                </div>
                            </div>
                            @if($birth)
                                <div class="col-12">
                                    <div class="d-flex align-items-center">
                                        <span class="me-2">🎂</span>
                                        <span>{{ \Carbon\Carbon::parse($birth)->translatedFormat('d F Y') }} — {{ $age }} ans</span>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <hr>

                        <p class="mb-3">
                            {{ $profil?->resume ?? "Aucun résumé disponible" }}
                        </p>

                        <div class="d-grid gap-2">
                            <a href="/prestations" class="btn btn-gradient">Voir mes prestations</a>
                            <a href="/contact" class="btn btn-gradient">Me contacter</a>
                        </div>
                            <div class="d-flex justify-content-center mt-4 mb-2">
                                <a href="https://www.facebook.com/gapalpesdusud05/" target="_blank" class="me-3">
                                    <img src="{{ asset('images/github-mark.svg') }}" alt="GitHub" class="social-icon">
                                </a>
                                <a href="https://www.instagram.com/gapalpesdusud05/" target="_blank">
                                    <img src="{{ asset('images/linkedin.svg') }}" alt="Linkedin" class="social-icon">
                                </a>
                            </div>
                    </div>
                </div>
            </div>

            <!-- Colonne droite : Parcours & Expériences -->
            <div class="col-12 col-lg-8">
                <!-- Parcours scolaire -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Parcours scolaire</h4>
                        <ul class="list-group list-group-flush">
                            @forelse(($educations ?? collect())->sortBy(['ordre','-annee_fin']) as $ed)
                                <li class="list-group-item d-flex align-items-start">
                                    <!-- Badge de diplôme -->
                                    <span class="badge bg-primary flex-shrink-0 text-uppercase d-flex align-items-center justify-content-center"
                                          style="min-width: 90px; text-align: center; height: 24px;">
                        {{ Str::of($ed->diplome)->explode(' ')->first() }}
                    </span>

                                    <!-- Contenu principal -->
                                    <div class="ms-3">
                                        <div class="fw-semibold">
                                            {{ $ed->diplome }} - {{ $ed->ecole }}
                                            @if($ed->annee_debut || $ed->annee_fin)
                                                <span class="text-muted"> · {{ $ed->annee_debut ?? '—' }}–{{ $ed->annee_fin ?? '—' }}</span>
                                            @endif
                                        </div>
                                        @if($ed->details)
                                            <small class="text-muted">{{ $ed->details }}</small>
                                        @endif
                                    </div>
                                </li>
                            @empty
                                <p>Aucune donnée disponible</p>
                            @endforelse
                        </ul>
                    </div>
                </div>

                <!-- Expériences professionnelles -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Expériences professionnelles</h4>

                        <div class="accordion" id="xpAccordion">
                            @forelse(($experiences ?? collect())->sortBy(['ordre','-date_de_debut']) as $xp)
                                @php
                                    $collapseId = 'c'.$loop->index;
                                    $headingId  = 'xp'.$loop->index;
                                    $open = $loop->first ? 'show' : '';
                                    $expanded = $loop->first ? 'true' : 'false';
                                    $titre = trim(($xp->titre ? $xp->titre.' — ' : '').($xp->entreprise ?? ''));
                                    if ($xp->poste_actuel) { $titre .= ' (poste actuel)'; }
                                @endphp
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="{{ $headingId }}">
                                        <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#{{ $collapseId }}"
                                                aria-expanded="{{ $expanded }}" aria-controls="{{ $collapseId }}">
                                            {{ $titre }}
                                        </button>
                                    </h2>
                                    <div id="{{ $collapseId }}" class="accordion-collapse collapse {{ $open }}"
                                         aria-labelledby="{{ $headingId }}" data-bs-parent="#xpAccordion">
                                        <div class="accordion-body">
                                            @if($xp->localisation || $xp->date_de_debut || $xp->date_de_fin)
                                                <p class="mb-2">
                                                    @if($xp->localisation) <strong>{{ $xp->localisation }}</strong> · @endif
                                                    @if($xp->date_de_debut)
                                                        {{ \Carbon\Carbon::parse($xp->date_de_debut)->translatedFormat('F Y') }}
                                                    @endif
                                                    –
                                                    @if($xp->poste_actuel)
                                                        Aujourd'hui
                                                    @elseif($xp->date_de_fin)
                                                        {{ \Carbon\Carbon::parse($xp->date_de_fin)->translatedFormat('F Y') }}
                                                    @endif
                                                </p>
                                            @endif
                                            <div>{{ $xp->description }}</div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p>Aucune données disponibles</p>
                            @endforelse
                        </div>

                    </div>
                </div>

                <!-- Compétences clés -->
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Compétences & centres d’intérêt</h4>
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <h6 class="text-muted">Compétences</h6>
                                <div class="d-flex flex-wrap gap-2">
                                    @forelse($competencesList as $c)
                                        <span class="badge bg-secondary">{{ $c->libelle }}</span>
                                    @empty
                                        <p>Aucune données disponibles</p>
                                    @endforelse
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <h6 class="text-muted">Intérêts</h6>
                                <div class="d-flex flex-wrap gap-2">
                                    @forelse($interetsList as $i)
                                        <span class="badge bg-light text-dark border">{{ $i->libelle }}</span>
                                    @empty
                                        <p>Aucune données disponibles</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="alert alert-gradient mb-0" role="alert">
                            Envie d’échanger sur un besoin applicatif ou un projet web&nbsp;? <a href="/contact" class="alert-link">Contacte-moi</a>.
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
