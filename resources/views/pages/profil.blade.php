@extends('layout.app')

@section('title')
    Hugo MARCEAU - Responsable applicatif : profil, compétences et parcours
@endsection

@section('meta_description', "Profil d’Hugo Marceau, responsable applicatif du SI Retraite à la CPRPF : MCO, besoins métier, évolutions réglementaires, recette et suivi des incidents.")

@section('header')
    @include('layout.header', [
        'titre' => 'Profil professionnel',
        'description' => 'Mon parcours et ma manière de faire vivre les applications métier.'
    ])
@endsection

@section('contenu')
    @php
        $profilName = $profil?->nom_prenom ?? 'Hugo MARCEAU';
        $initials = Str::of($profilName)
            ->split('/\s+/')
            ->filter()
            ->map(fn($part) => mb_substr($part, 0, 1))
            ->implode('') ?: 'HM';
        $competencesByCategory = ($competences ?? collect())->groupBy(fn($item) => $item->categorie ?: 'Compétences');
    @endphp

    <main class="profile-page py-5">
        <section class="row g-4 align-items-stretch mb-5">
            <div class="col-12 col-lg-4">
                <aside class="profile-identity h-100">
                    <div class="text-center mb-4">
                        @if(!empty($profil?->photo_source))
                            <img src="{{ asset('storage/'.$profil->photo_source) }}"
                                 alt="Photo de {{ $profilName }}"
                                 class="profile-avatar">
                        @else
                            <div class="profile-avatar profile-avatar-fallback">
                                {{ $initials }}
                            </div>
                        @endif
                    </div>

                    <h2 class="h3 text-center mb-2">{{ $profilName }}</h2>
                    <p class="text-center text-muted mb-4">{{ $profil?->en_tete ?? 'Responsable applicatif · SI Retraite' }}</p>

                    <dl class="profile-facts">
                        <div>
                            <dt>Localisation</dt>
                            <dd>{{ $profil?->ville ?? 'Aix-en-Provence / Marseille' }}</dd>
                        </div>
                        <div>
                            <dt>Mobilité</dt>
                            <dd>Région d’Aix-en-Provence et de Marseille</dd>
                        </div>
                        <div>
                            <dt>Spécialité</dt>
                            <dd>Pilotage et maintien en condition opérationnelle des applications métier</dd>
                        </div>
                    </dl>

                    <div class="d-grid gap-2 mt-4">
                        <a href="{{ route('index.contact') }}" class="btn btn-gradient">Me contacter</a>
                        <a href="https://www.linkedin.com/in/hugo-marceau-ab6a74213/" target="_blank" rel="noopener noreferrer" class="btn btn-outline-dark">Voir LinkedIn</a>
                    </div>

                    <div class="d-flex justify-content-center gap-3 mt-4">
                        <a href="https://github.com/hugo05000" target="_blank" rel="noopener noreferrer" aria-label="GitHub Hugo Marceau">
                            <img src="{{ asset('images/github-mark.svg') }}" alt="GitHub" class="social-icon">
                        </a>
                        <a href="https://www.linkedin.com/in/hugo-marceau-ab6a74213/" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn Hugo Marceau">
                            <img src="{{ asset('images/linkedin.svg') }}" alt="LinkedIn" class="social-icon">
                        </a>
                    </div>
                </aside>
            </div>

            <div class="col-12 col-lg-8">
                <div class="profile-summary h-100">
                    <p class="section-eyebrow mb-2">Ma démarche</p>
                    <h2 class="profile-title mb-3">Faire le lien entre les besoins métier et la réalité technique.</h2>
                    <p class="lead text-muted mb-4">
                        {{ $profil?->resume ?? "Au sein du SI Retraite de la CPRPF, j’assure le suivi d’un périmètre applicatif sur tout son cycle de vie. Je recueille les besoins, cadre les évolutions, accompagne les développements et la recette, puis veille à la qualité du service rendu en production." }}
                    </p>
                    <p class="text-muted mb-4">Au quotidien, SAFe structure la coordination des évolutions et ITIL guide le suivi du service en production.</p>

                    <div class="row g-3">
                        <div class="col-12 col-md-4">
                            <div class="proof-box h-100">
                                <span>01</span>
                                <strong>Écouter et cadrer</strong>
                                <p>Comprendre les usages et traduire les demandes en solutions fonctionnelles.</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="proof-box h-100">
                                <span>02</span>
                                <strong>Coordonner et livrer</strong>
                                <p>Suivre les développeurs, les tests, la recette et les mises en production.</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="proof-box h-100">
                                <span>03</span>
                                <strong>Maintenir et améliorer</strong>
                                <p>Assurer le MCO, résoudre les incidents et suivre la qualité avec l’appui de SQL.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-5" id="expertise">
            <div class="section-heading">
                <p class="section-eyebrow mb-2">Au quotidien</p>
                <h2 class="section-title">Mes missions en détail</h2>
            </div>

            <div class="row g-4">
                <div class="col-12 col-md-6">
                    <article class="expertise-detail art-pilotage h-100">
                        <h3>Pilotage et MCO</h3>
                        <p>Je suis responsable du suivi global de mon périmètre : continuité de service, maintenance et évolution de l’application dans la durée.</p>
                    </article>
                </div>
                <div class="col-12 col-md-6">
                    <article class="expertise-detail art-evolution h-100">
                        <h3>Évolutions logicielle</h3>
                        <p>Je cadre les changements, conçois l'architecture applicative, organise les tests et la recette, prépare la mise en production et suis les premières utilisations.</p>
                    </article>
                </div>
                <div class="col-12 col-md-6">
                    <article class="expertise-detail art-metier h-100">
                        <h3>Accompagnement métier</h3>
                        <p>Je recueille et analyse les besoins, mène le cadrage fonctionnel et reste disponible pour les utilisateurs dans le suivi quotidien.</p>
                    </article>
                </div>
                <div class="col-12 col-md-6">
                    <article class="expertise-detail art-coordination h-100">
                        <h3>Coordination technique</h3>
                        <p>Je garde un lien continu avec les développeurs pour suivre les réalisations et vérifier leur alignement avec le besoin métier.</p>
                    </article>
                </div>
                <div class="col-12 col-md-6">
                    <article class="expertise-detail art-qualite h-100">
                        <h3>Incidents et qualité</h3>
                        <p>J’analyse et résous les incidents utilisateurs. Je réalise également des tests de non régression et des tests fonctionnelles afin de m'assurer de la qualité du produit.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="row g-4 mb-5" id="experiences">
            <div class="col-12 col-lg-4">
                <div class="sticky-section-heading">
                    <p class="section-eyebrow mb-2">Expériences</p>
                    <h2 class="section-title">Mon parcours professionnel</h2>
                    <p class="text-muted mb-0">Du développement web à la responsabilité applicative, avec un même fil conducteur : rendre les outils utiles et fiables pour leurs utilisateurs.</p>
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="timeline-list">
                    @forelse(($experiences ?? collect())->sortByDesc('date_de_debut') as $xp)
                        <article class="timeline-card">
                            <div class="timeline-marker"></div>
                            <div>
                                <div class="d-flex flex-wrap gap-2 align-items-center mb-2">
                                    <h3 class="h5 mb-0">{{ $xp->titre }}</h3>
                                    @if($xp->poste_actuel)
                                        <span class="badge text-bg-success">Poste actuel</span>
                                    @endif
                                </div>
                                <p class="fw-semibold mb-1">{{ $xp->entreprise }}</p>
                                <p class="small text-muted mb-3">
                                    @if($xp->localisation)
                                        {{ $xp->localisation }} ·
                                    @endif
                                    @if($xp->date_de_debut)
                                        {{ \Carbon\Carbon::parse($xp->date_de_debut)->translatedFormat('F Y') }}
                                    @endif
                                    -
                                    @if($xp->poste_actuel)
                                        Aujourd'hui
                                    @elseif($xp->date_de_fin)
                                        {{ \Carbon\Carbon::parse($xp->date_de_fin)->translatedFormat('F Y') }}
                                    @else
                                        Date de fin non renseignée
                                    @endif
                                </p>
                                @if($xp->description)
                                    <p class="mb-0">{{ $xp->description }}</p>
                                @endif
                            </div>
                        </article>
                    @empty
                        <article class="timeline-card">
                            <div class="timeline-marker"></div>
                            <div>
                                <h3 class="h5 mb-2">Responsable applicatif SI Retraite</h3>
                                <p class="mb-0">Pilotage d’un périmètre applicatif en lien avec les équipes métier et techniques, de l’évolution des besoins au suivi en production.</p>
                            </div>
                        </article>
                    @endforelse
                </div>
            </div>
        </section>

        <section class="row g-4 mb-5" id="competences">
            <div class="col-12 col-lg-5">
                <div class="section-panel h-100">
                    <p class="section-eyebrow mb-2">Compétences</p>
                    <h2 class="section-title mb-3">Des compétences au service de la continuité.</h2>
                    <p class="text-muted mb-0">Des méthodes de suivi fonctionnel et une culture technique mobilisées pour faire avancer les sujets, de la demande à la production.</p>
                </div>
            </div>

            <div class="col-12 col-lg-7">
                <div class="skills-groups">
                    @forelse($competencesByCategory as $category => $items)
                        <div class="skills-group">
                            <h3>{{ $category }}</h3>
                            <div class="skills-cloud">
                                @foreach($items as $item)
                                    <span>{{ $item->libelle }}</span>
                                @endforeach
                            </div>
                        </div>
                    @empty
                        <div class="skills-group">
                            <h3>Pilotage applicatif</h3>
                            <div class="skills-cloud">
                                <span>Analyse des besoins</span>
                                <span>Cadrage fonctionnel</span>
                                <span>MCO</span>
                                <span>Recette</span>
                                <span>Gestion des incidents</span>
                                <span>SQL</span>
                            </div>
                        </div>
                    @endforelse

                    @if(($interets ?? collect())->count())
                        <div class="skills-group">
                            <h3>Centres d’intérêt</h3>
                            <div class="skills-cloud skills-cloud-muted">
                                @foreach($interets as $interest)
                                    <span>{{ $interest->libelle }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        @if(($educations ?? collect())->count())
        <section class="row g-4 align-items-start mb-5" id="formations">
            <div class="col-12 col-lg-4">
                <p class="section-eyebrow mb-2">Formation</p>
                <h2 class="section-title">Mon parcours de formation</h2>
            </div>
            <div class="col-12 col-lg-8">
                <div class="education-list">
                    @foreach(($educations ?? collect())->sortByDesc('annee_fin') as $ed)
                        <article class="education-item">
                            <span class="education-year">{{ $ed->annee_debut }} - {{ $ed->annee_fin }}</span>
                            <div>
                                <h3 class="h5 mb-1">{{ $ed->diplome }}</h3>
                                @if($ed->ecole)
                                    <p class="fw-semibold mb-1">{{ $ed->ecole }}</p>
                                @endif
                                @if($ed->details)
                                    <p class="text-muted mb-0">{{ $ed->details }}</p>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        <section class="section-panel recruiter-panel">
            <div class="row g-4 align-items-center">
                <div class="col-12 col-lg-8">
                    <p class="section-eyebrow mb-2">Prenons contact</p>
                    <h2 class="section-title mb-3">Discutons de ce que je peux apporter à votre équipe.</h2>
                    <p class="mb-0">Prenez connaissance de mon parcours, ma manière de piloter un périmètre applicatif et des exemples concrets de sujets que j'ai pu suivre.</p>
                </div>
                <div class="col-12 col-lg-4 text-lg-end">
                    <a href="{{ route('index.contact') }}" class="btn btn-gradient btn-lg">Me contacter</a>
                </div>
            </div>
        </section>
    </main>
@endsection
