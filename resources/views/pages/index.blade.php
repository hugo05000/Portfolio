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
                    <div class="card-body text-center py-4 px-4">
                        <h2 class="card-title mb-3 fw-bold">Qui suis-je ?</h2>

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
    </div>
@endsection
