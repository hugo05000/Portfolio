@extends('layout.app')

@section('title')
    Hugo MARCEAU | Responsable applicatif SI à Aix-en-Provence
@endsection

@section('meta_description', "Hugo Marceau, responsable applicatif du SI Retraite à la CPRPF. Basé à Aix-en-Provence, mobile sur la région de Marseille. Parcours, compétences en pilotage applicatif et contact.")

@section('header')
    @include('layout.header', [
        'titre' => 'Hugo MARCEAU',
        'description' => $profil?->en_tete ?? 'Responsable applicatif SI Retraite · CPRPF'
    ])
@endsection

@section('contenu')
    <main class="portfolio-home py-5">
        <section class="section-panel section-panel-highlight mb-5">
            <div class="row align-items-center g-4">
                <div class="col-12 col-lg-7">
                    <p class="section-eyebrow mb-2">Portfolio professionnel</p>
                    <h2 class="section-title mb-3">
                        Responsable applicatif : je pilote des applications métier, du besoin utilisateur jusqu’à la mise en production.
                    </h2>
                    <p class="lead text-muted mb-4">
                        En charge du périmètre applicatif du SI Retraite à la CPRPF, j’analyse les besoins, rédige les spécifications, suis les développements et pilote les tests et les mises en production. Basé à Aix-en-Provence, mobile sur la région de Marseille.
                    </p>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('index.profil') }}" class="btn btn-gradient btn-lg">Voir mon profil</a>
                        <a href="{{ route('index.contact') }}" class="btn btn-outline-dark btn-lg">Me contacter</a>
                    </div>
                </div>

                <div class="col-12 col-lg-5">
                    <div class="value-card">
                        <h3 class="h5 mb-3">Ce que je mets en avant</h3>
                        <div class="value-list">
                            <div>
                                <span class="value-kicker">Pilotage applicatif</span>
                                <p class="mb-0">Spécifications, suivi des développements, recette et mises en production.</p>
                            </div>
                            <div>
                                <span class="value-kicker">Relation métier</span>
                                <p class="mb-0">Analyse des besoins, accompagnement des utilisateurs et déploiement des nouvelles fonctionnalités.</p>
                            </div>
                            <div>
                                <span class="value-kicker">Culture technique</span>
                                <p class="mb-0">Un passé de développeur web qui facilite le dialogue avec les équipes de développement.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-5">
            <div class="row g-3">
                <div class="col-12 col-md-4">
                    <div class="metric-box h-100">
                        <span class="metric-number">Build</span>
                        <span class="metric-label">Analyse des besoins, spécifications techniques, conception et suivi des développements.</span>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="metric-box h-100">
                        <span class="metric-number">Run</span>
                        <span class="metric-label">Pilotage des tests, mises en production et coordination de la maintenance applicative.</span>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="metric-box h-100">
                        <span class="metric-number">Agile</span>
                        <span class="metric-label">Projets menés en SCRUM dans un cadre SAFe, avec une expérience du cycle en V.</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-5">
            <div class="section-heading">
                <p class="section-eyebrow mb-2">Expertise</p>
                <h2 class="section-title">Les sujets sur lesquels je peux apporter de la valeur</h2>
            </div>

            <div class="row g-4">
                <div class="col-12 col-md-6 col-xl-3">
                    <article class="expertise-card h-100">
                        <span class="expertise-index">01</span>
                        <h3>Analyse des besoins</h3>
                        <p>Recueillir les besoins des utilisateurs métier, les challenger et les traduire en spécifications techniques exploitables.</p>
                    </article>
                </div>
                <div class="col-12 col-md-6 col-xl-3">
                    <article class="expertise-card h-100">
                        <span class="expertise-index">02</span>
                        <h3>Suivi des développements</h3>
                        <p>Concevoir les solutions, suivre les développements et garantir la cohérence entre le besoin exprimé et ce qui est livré.</p>
                    </article>
                </div>
                <div class="col-12 col-md-6 col-xl-3">
                    <article class="expertise-card h-100">
                        <span class="expertise-index">03</span>
                        <h3>Tests et mises en production</h3>
                        <p>Piloter les campagnes de tests, sécuriser les mises en production et accompagner le déploiement des nouvelles fonctionnalités.</p>
                    </article>
                </div>
                <div class="col-12 col-md-6 col-xl-3">
                    <article class="expertise-card h-100">
                        <span class="expertise-index">04</span>
                        <h3>Maintenance et relation métier</h3>
                        <p>Coordonner la maintenance applicative, prioriser les demandes et entretenir un lien de confiance avec les métiers.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="section-panel mb-5">
            <div class="row g-4 align-items-start">
                <div class="col-12 col-lg-5">
                    <p class="section-eyebrow mb-2">Parcours</p>
                    <h2 class="section-title mb-3">Un parcours construit vers la responsabilité applicative.</h2>
                    <p class="text-muted mb-4">
                        Du développement web au pilotage d’un périmètre applicatif, mon parcours me donne une double lecture utile en équipe : la compréhension technique des développements et la compréhension opérationnelle des enjeux métier.
                    </p>
                    <a href="{{ route('index.profil') }}#experiences" class="btn btn-outline-dark">Explorer le parcours</a>
                </div>

                <div class="col-12 col-lg-7">
                    <div class="mini-timeline">
                        @foreach($experiences as $xp)
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
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-5">
            <div class="row g-4 align-items-center">
                <div class="col-12 col-lg-4">
                    <p class="section-eyebrow mb-2">Compétences</p>
                    <h2 class="section-title mb-3">Le pilotage applicatif, appuyé par une vraie culture technique.</h2>
                    <p class="text-muted mb-0">Méthodes de gestion de projet, outils de suivi et technologies que je pratique au quotidien ou que j’ai utilisées en développement.</p>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="skills-cloud">
                        @forelse($competences as $competence)
                            <span>{{ $competence->libelle }}</span>
                        @empty
                            <span>Analyse des besoins</span>
                            <span>Spécifications techniques</span>
                            <span>Pilotage des tests</span>
                            <span>Mises en production</span>
                            <span>SCRUM / SAFe</span>
                            <span>SQL Server</span>
                            <span>MySQL</span>
                            <span>PHP / Laravel</span>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>

        <section class="section-panel recruiter-panel mb-5">
            <div class="row g-4 align-items-center">
                <div class="col-12 col-lg-8">
                    <p class="section-eyebrow mb-2">Recruteurs</p>
                    <h2 class="section-title mb-3">Ce que je peux apporter à votre organisation</h2>
                    <p class="mb-0">
                        Comprendre le besoin métier, cadrer et spécifier, suivre les développements, sécuriser les tests et les mises en production, maintenir ce qui est livré... Basé à Aix-en-Provence, mobile sur la région de Marseille.
                    </p>
                </div>
                <div class="col-12 col-lg-4 text-lg-end">
                    <a href="{{ route('index.contact') }}" class="btn btn-gradient btn-lg">Planifier un échange</a>
                </div>
            </div>
        </section>

        <section class="py-4">
            <div class="section-heading text-center">
                <p class="section-eyebrow mb-2">Références</p>
                <h2 class="section-title">Ils m'ont fait confiance</h2>
                <p class="text-muted mb-0">Projets web réalisés en parallèle de mon parcours, qui entretiennent ma culture technique.</p>
            </div>

            @if(isset($clients) && $clients->count())
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
            @else
                <p class="text-center text-muted py-4 mb-0">
                    Les références seront ajoutées prochainement.
                </p>
            @endif
        </section>
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
            "Spécifications techniques",
            "Pilotage des tests et mises en production",
            "SCRUM",
            "SAFe",
            "Laravel",
            "PHP",
            "SQL"
        ]
    }
    </script>
@endsection
