@extends('layout.app')

@section('title')
    Hugo MARCEAU - Responsable applicatif : profil, compétences et parcours
@endsection

@section('meta_description', "Profil d’Hugo Marceau, responsable applicatif du SI Retraite à la CPRPF : pilotage applicatif, spécifications, tests et mises en production. Basé à Aix-en-Provence, mobile région de Marseille.")

@section('header')
    @include('layout.header', [
        'titre' => 'Profil professionnel',
        'description' => 'Pilotage applicatif, parcours et compétences.'
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
                    <p class="text-center text-muted mb-4">{{ $profil?->en_tete ?? 'Responsable applicatif SI Retraite · CPRPF' }}</p>

                    <dl class="profile-facts">
                        <div>
                            <dt>Localisation</dt>
                            <dd>{{ $profil?->ville ?? 'Aix-en-Provence / Marseille' }}</dd>
                        </div>
                        @if($profil?->date_de_naissance)
                            <div>
                                <dt>Profil</dt>
                                <dd>{{ \Carbon\Carbon::parse($profil?->date_de_naissance)->age }} ans, responsable applicatif au croisement du métier et de la technique</dd>
                            </div>
                        @endif
                        <div>
                            <dt>Mobilité</dt>
                            <dd>Aix-en-Provence et région de Marseille. Ouvert aux échanges professionnels.</dd>
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
                    <p class="section-eyebrow mb-2">Synthèse</p>
                    <h1 class="profile-title mb-3">Responsable applicatif : je fais le lien entre les besoins métier et les équipes de développement.</h1>
                    <p class="lead text-muted mb-4">
                        {{ $profil?->resume ?? "Responsable applicatif au sein du SI Retraite de la CPRPF, je pilote un périmètre applicatif de bout en bout : analyse des besoins utilisateurs, spécifications techniques, suivi des développements, tests et mises en production. Mon passé de développeur web me permet de dialoguer efficacement avec les équipes techniques." }}
                    </p>

                    <div class="row g-3">
                        <div class="col-12 col-md-4">
                            <div class="proof-box h-100">
                                <span>01</span>
                                <strong>Analyser et spécifier</strong>
                                <p>Recueil des besoins utilisateurs, cadrage des demandes et rédaction des spécifications techniques.</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="proof-box h-100">
                                <span>02</span>
                                <strong>Concevoir et suivre</strong>
                                <p>Conception des solutions, suivi des développements et cohérence entre le besoin exprimé et le livré.</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="proof-box h-100">
                                <span>03</span>
                                <strong>Tester et déployer</strong>
                                <p>Pilotage des tests, sécurisation des mises en production et accompagnement des utilisateurs au déploiement.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-5" id="expertise">
            <div class="section-heading">
                <p class="section-eyebrow mb-2">Expertise</p>
                <h2 class="section-title">Mes axes de compétence</h2>
            </div>

            <div class="row g-4">
                <div class="col-12 col-md-6">
                    <article class="expertise-detail h-100">
                        <h3>Analyse des besoins et spécifications</h3>
                        <p>Recueil et cadrage des besoins des utilisateurs métier, rédaction de spécifications techniques claires et priorisation des évolutions du périmètre applicatif.</p>
                    </article>
                </div>
                <div class="col-12 col-md-6">
                    <article class="expertise-detail h-100">
                        <h3>Pilotage des développements et des mises en production</h3>
                        <p>Conception et suivi des développements, pilotage des campagnes de tests, sécurisation des mises en production et accompagnement au déploiement des nouvelles fonctionnalités.</p>
                    </article>
                </div>
                <div class="col-12 col-md-6">
                    <article class="expertise-detail h-100">
                        <h3>Maintenance applicative et relation métier</h3>
                        <p>Coordination de la maintenance, traitement et priorisation des demandes, documentation et lien permanent avec les utilisateurs métier.</p>
                    </article>
                </div>
                <div class="col-12 col-md-6">
                    <article class="expertise-detail h-100">
                        <h3>Méthodes et culture technique</h3>
                        <p>Projets menés en SCRUM dans un cadre SAFe, expérience du cycle en V, et un passé de développeur web (Laravel/PHP, SQL) qui facilite les échanges avec les équipes techniques.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="row g-4 mb-5" id="experiences">
            <div class="col-12 col-lg-4">
                <div class="sticky-section-heading">
                    <p class="section-eyebrow mb-2">Expériences</p>
                    <h2 class="section-title">Mon parcours professionnel</h2>
                    <p class="text-muted mb-0">Une progression du développement vers la responsabilité applicative, avec une constante : le lien entre les utilisateurs et la technique.</p>
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
                                <p class="mb-0">Les expériences renseignées depuis l’administration seront affichées ici.</p>
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
                    <h2 class="section-title mb-3">Le pilotage applicatif d’abord, la technique en appui.</h2>
                    <p class="text-muted mb-0">Analyse, spécification, tests, mises en production : des compétences de pilotage renforcées par une pratique réelle du développement.</p>
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
                                <span>Spécifications techniques</span>
                                <span>Pilotage des tests</span>
                                <span>Mises en production</span>
                                <span>SCRUM / SAFe</span>
                                <span>PHP / Laravel</span>
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

        <section class="row g-4 align-items-start mb-5" id="formations">
            <div class="col-12 col-lg-4">
                <p class="section-eyebrow mb-2">Formation</p>
                <h2 class="section-title">Parcours scolaire</h2>
            </div>
            <div class="col-12 col-lg-8">
                <div class="education-list">
                    @forelse(($educations ?? collect())->sortByDesc('annee_fin') as $ed)
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
                    @empty
                        <p class="text-muted mb-0">Les formations seront affichées ici dès qu’elles seront renseignées.</p>
                    @endforelse
                </div>
            </div>
        </section>

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
