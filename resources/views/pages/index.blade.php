@extends('layout.app')

@section('title')
    Portfolio - Hugo MARCEAU
@endsection

@section('meta_description', "Portfolio d’Hugo Marceau : développeur web et responsable applicatif SI à la CPRPF. Projets, prestations, contact et informations professionnelles.")

@section('header')

    @include('layout.header', ['titre' => 'Bienvenue sur mon portfolio', 'description' => 'Responsable applicatif et développeur à ses heures perdus...'])

@endsection

@section('contenu')
    <div class="container-fluid py-5">

        <!-- Bloc Présentation -->
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card bg-light shadow-sm border-0 h-100">
                    <div class="card-body py-4 px-4">
                        <div class="text-center">
                            <h2 class="card-title mb-3 fw-bold title-gradient-underline ">Qui suis-je ?</h2>
                        </div>
                        <div class="text-justify">
                            <p class="card-text text-muted mb-2">
                                Je m'appelle Hugo MARCEAU, j'ai
                                {{ \Carbon\Carbon::create(2001, 1, 15)->age }}
                                ans et je suis Responsable applicatif SI chez la CPRPF.
                            </p>

                            <p class="card-text text-muted mb-2">
                                Je conçois, maintiens et améliore des applications métiers. En parallèle, je développe des sites web,
                                j’assemble des PC sur mesure et je forme aux bases du développement web.
                            </p>

                            <p class="card-text text-muted">
                                Sur ce portfolio, vous trouverez&nbsp;:
                                <span class="fw-semibold">mon profil</span>,
                                <span class="fw-semibold">les prestations que je propose</span>
                                et <span class="fw-semibold">un moyen de me contacter</span>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cartes principales : Profil / Prestations / Contact -->
        <div class="row">
            <!-- Bloc Profil -->
            <div class="col-md-4 col-12 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <img src="{{ asset('/images/profil.webp') }}" class="card-img-top"
                         alt="Photo de profil"
                         style="object-fit: cover; height: 200px;">
                    <div class="card-body text-center p-4">
                        <h5 class="card-title fw-bold mb-2">Profil</h5>
                        <p class="card-text text-muted">
                            Parcours, compétences techniques et responsabilités actuelles.
                        </p>
                        <a href="{{ route('index.profil') }}" class="btn btn-gradient px-3">
                            Découvrir mon profil
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bloc Prestations -->
            <div class="col-md-4 col-12 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <img src="{{ asset('/images/prestations.webp') }}" class="card-img-top"
                         alt="Prestations"
                         style="object-fit: cover; height: 200px;">
                    <div class="card-body text-center p-4">
                        <h5 class="card-title fw-bold mb-2">Prestations</h5>
                        <p class="card-text text-muted">
                            Développement web sur mesure, montage et réparation PC, formation web.
                        </p>
                        <a href="{{ route('index.prestations') }}" class="btn btn-gradient px-3">
                            Voir les prestations
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bloc Contact -->
            <div class="col-md-4 col-12 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <img src="{{ asset('/images/contact.webp') }}" class="card-img-top"
                         alt="Contact"
                         style="object-fit: cover; height: 200px;">
                    <div class="card-body text-center p-4">
                        <h5 class="card-title fw-bold mb-2">Contact</h5>
                        <p class="card-text text-muted">
                            Un projet ? Une question ? Parlons-en.
                        </p>
                        <a href="{{ route('index.contact') }}" class="btn btn-gradient px-3">
                            Envoyer un message
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <section class="py-5 bg-light"> <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-12 text-center">
                        <h2 class="fw-bold mb-0">Ils m'ont fait confiance</h2>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-12">
                        @if(isset($clients) && $clients->count())
                            <div class="row row-cols-2 row-cols-md-4 row-cols-lg-5 g-4 align-items-center justify-content-center">
                                @foreach($clients as $client)
                                    <div class="col">
                                        <div class="client-box position-relative d-flex flex-column align-items-center justify-content-center p-3 h-100 rounded-3">

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
                            <p class="text-center text-muted py-5">
                                Les premiers clients seront bientôt affichés ici.
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
