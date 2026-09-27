@extends('layout.app')

@section('title')
    Hugo MARCEAU | Responsable applicatif SI à Aix-en-Provence
@endsection

@section('meta_description', "Hugo Marceau, responsable applicatif du SI Retraite à la CPRPF : MCO, évolutions réglementaires, relation métier, coordination technique et gestion des incidents.")

@section('header')
    @include('layout.header', [
        'titre' => 'Hugo MARCEAU',
        'description' => $profil?->en_tete ?? 'Je relie les besoins métier, les équipes techniques et la vie des applications.'
    ])
@endsection

@section('contenu')
    <main class="portfolio-home py-5">
        <section class="intro-section mb-5">
            <div class="row align-items-end g-4 g-lg-5">
                <div class="col-12 col-lg-7">
                    <p class="section-eyebrow mb-3">À propos de mon métier</p>
                    <h2 class="section-title mb-0">
                        Donner un cap clair aux applications qui comptent.
                    </h2>
                </div>
                <div class="col-12 col-lg-5">
                    <p class="lead mb-4">
                        Responsable applicatif sur le SI Retraite à la CPRPF, je pilote un périmètre au quotidien : continuité de service, évolutions réglementaires et qualité des livraisons, en lien étroit avec les métiers et les équipes techniques.
                    </p>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('index.profil') }}" class="btn btn-gradient">Découvrir mon profil <span aria-hidden="true">↗</span></a>
                        <a href="{{ route('index.contact') }}" class="btn btn-outline-dark">Me contacter</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="process-strip mb-5" aria-label="Mon intervention dans le cycle applicatif">
            <div><span>01 / Comprendre</span><strong>Besoins métier</strong></div>
            <div><span>02 / Faire évoluer</span><strong>Conception logicielle</strong></div>
            <div><span>03 / Sécuriser</span><strong>Recette et mise en production</strong></div>
            <div><span>04 / Pérenniser</span><strong>MCO et qualité</strong></div>
        </section>

        <section class="mb-5" id="missions">
            <div class="row g-4 align-items-start mb-4">
                <div class="col-12 col-lg-4">
                    <p class="section-eyebrow mb-2">Mon périmètre</p>
                    <h2 class="section-title">Un rôle de coordination, de bout en bout.</h2>
                </div>
                <div class="col-12 col-lg-7 offset-lg-1">
                    <p class="section-intro mb-0">Je garde une vision d’ensemble de l’application tout en restant au contact des demandes utilisateurs, des développements et des incidents. Je m’appuie sur SAFe pour coordonner les évolutions et sur ITIL pour le suivi du service.</p>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-12 col-md-6 col-xl-4">
                    <article class="expertise-card h-100">
                        <span class="expertise-index">01</span>
                        <h3>Évolutions applicatives</h3>
                        <p>Cadrage, conception, tests, recette, préparation de la mise en production et suivi après livraison.</p>
                    </article>
                </div>
                <div class="col-12 col-md-6 col-xl-4">
                    <article class="expertise-card h-100">
                        <span class="expertise-index">02</span>
                        <h3>Pilotage applicatif</h3>
                        <p>Maintien en condition opérationnelle et suivi du cycle de vie de mon périmètre applicatif.</p>
                    </article>
                </div>
                <div class="col-12 col-md-6 col-xl-4">
                    <article class="expertise-card h-100">
                        <span class="expertise-index">03</span>
                        <h3>Accompagnement métier</h3>
                        <p>Recueil et analyse des besoins, cadrage fonctionnel et suivi quotidien auprès des utilisateurs.</p>
                    </article>
                </div>
                <div class="col-12 col-md-6 col-xl-4">
                    <article class="expertise-card h-100">
                        <span class="expertise-index">04</span>
                        <h3>Coordination technique</h3>
                        <p>Alignement continu avec les développeurs et suivi rapproché des réalisations.</p>
                    </article>
                </div>
                <div class="col-12 col-md-6 col-xl-4">
                    <article class="expertise-card h-100">
                        <span class="expertise-index">05</span>
                        <h3>Incidents et qualité</h3>
                        <p>Analyse et résolution des incidents des utilisateurs. Tests fonctionnelles et tests de non régression. </p>
                    </article>
                </div>
            </div>
        </section>

        <section class="section-panel mb-5">
            <div class="row g-4 align-items-start">
                <div class="col-12 col-lg-5">
                    <p class="section-eyebrow mb-2">Parcours</p>
                    <h2 class="section-title mb-3">Du développement au pilotage applicatif.</h2>
                    <p class="text-muted mb-4">
                        Mon expérience en développement web nourrit aujourd’hui mon dialogue avec les équipes techniques. Elle m’aide à relier les enjeux métier aux choix de conception, puis à suivre les solutions jusqu’à leur exploitation.
                    </p>
                    <a href="{{ route('index.profil') }}#experiences" class="btn btn-outline-dark">Explorer le parcours</a>
                </div>

                <div class="col-12 col-lg-7">
                    <div class="mini-timeline">
                        @forelse($experiences as $xp)
                            <article class="mini-timeline-item">
                                <span class="timeline-dot"></span>
                                <div>
                                    <h3 class="h6 mb-1">{{ $xp->titre }} · {{ $xp->entreprise }}</h3>
                                    <p class="small text-muted mb-2">
                                        @if($xp->date_de_debut)
                                            {{ \Carbon\Carbon::parse($xp->date_de_debut)->translatedFormat('F Y') }}
                                        @endif
                                        –
                                        @if($xp->poste_actuel)
                                            Aujourd'hui
                                        @elseif($xp->date_de_fin)
                                            {{ \Carbon\Carbon::parse($xp->date_de_fin)->translatedFormat('F Y') }}
                                        @else
                                            Date de fin non renseignée
                                        @endif
                                    </p>
                                    @if($xp->description)
                                        <p class="mb-0">{{ Str::limit($xp->description, 180) }}</p>
                                    @endif
                                </div>
                            </article>
                        @empty
                            <p class="mb-0">Un parcours du développement web vers le pilotage et le maintien en condition opérationnelle des applications métier.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-5">
            <div class="row g-4 align-items-center">
                <div class="col-12 col-lg-4">
                    <p class="section-eyebrow mb-2">Compétences</p>
                    <h2 class="section-title mb-3">Le fonctionnel et la technique se parlent.</h2>
                    <p class="text-muted mb-0">Une pratique du cadrage, de la recette et du suivi de production, soutenue par une culture du développement et des données.</p>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="skills-cloud">
                        @forelse($competences as $competence)
                            <span>{{ $competence->libelle }}</span>
                        @empty
                            <span>Analyse des besoins</span>
                            <span>Cadrage fonctionnel</span>
                            <span>MCO</span>
                            <span>Recette</span>
                            <span>Gestion des incidents</span>
                            <span>SQL</span>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>

        <section class="section-panel recruiter-panel mb-5">
            <div class="row g-4 align-items-center">
                <div class="col-12 col-lg-8">
                    <p class="section-eyebrow mb-2">Échangeons</p>
                    <h2 class="section-title mb-3">Parlons de vos enjeux applicatifs.</h2>
                    <p class="mb-0">
                        Je suis basé à Aix-en-Provence et ouvert aux échanges professionnels dans la région de Marseille.
                    </p>
                </div>
                <div class="col-12 col-lg-4 text-lg-end">
                    <a href="{{ route('index.contact') }}" class="btn btn-gradient btn-lg">Prendre contact <span aria-hidden="true">↗</span></a>
                </div>
            </div>
        </section>

        @if(isset($clients) && $clients->count())
        <section class="py-4">
            <div class="section-heading text-center">
                <p class="section-eyebrow mb-2">Références</p>
                <h2 class="section-title">Quelques références web</h2>
                <p class="text-muted mb-0">Des projets qui prolongent ma pratique du développement.</p>
            </div>

                <div class="row row-cols-2 row-cols-md-4 row-cols-lg-5 g-4 align-items-center justify-content-center">
                    @foreach($clients as $client)
                        <div class="col">
                            <div class="client-box position-relative d-flex flex-column align-items-center justify-content-center p-3 h-100">
                                @if($client->lien)
                                    <a href="{{ $client->lien }}" class="stretched-link" target="_blank" rel="noopener noreferrer" title="Visiter le site de {{ $client->nom }}"></a>
                                @endif

                                <img src="{{ asset('storage/' . $client->image) }}"
                                     alt="{{ $client->nom }}"
                                     class="img-fluid client-logo mb-2"
                                     loading="lazy">

                                <span class="small text-muted text-center fw-semibold lh-sm">
                                    {{ $client->nom }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
        </section>
        @endif
    </main>

    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@type": "Person",
        "name": "Hugo Marceau",
        "jobTitle": "Responsable applicatif SI Retraite",
        "worksFor": {
            "@type": "Organization",
            "name": "CPRPF"
        },
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "Aix-en-Provence",
            "addressRegion": "Provence-Alpes-Côte d'Azur",
            "addressCountry": "FR"
        },
        "url": "{{ url('/') }}",
        "sameAs": [
            "https://www.linkedin.com/in/hugo-marceau-ab6a74213/",
            "https://github.com/hugo05000"
        ],
        "knowsAbout": [
            "Gestion applicative",
            "Analyse des besoins",
            "Maintien en condition opérationnelle",
            "Évolutions réglementaires",
            "Recette et mise en production",
            "Coordination technique",
            "Gestion des incidents",
            "SQL"
        ]
    }
    </script>
@endsection
