@extends('layout.app')

@section('title')
    Hugo MARCEAU - Contact
@endsection

@section('meta_description', "Contactez Hugo Marceau, responsable applicatif SI à Aix-en-Provence, pour échanger autour d'une opportunité professionnelle ou d'une question sur son parcours.")

@section('header')

    @include('layout.header', ['titre' => 'Échangeons', 'description' => 'Une question sur mon parcours ou un projet applicatif à discuter ?'])

@endsection

@section('contenu')
    <main class="contact-page py-5">
        <div class="row g-5 align-items-start">
            <div class="col-12 col-lg-4">
                <aside class="contact-aside">
                    <p class="section-eyebrow mb-3">Prendre contact</p>
                    <h2 class="section-title mb-4">La conversation commence ici.</h2>
                    <p>Vous recrutez, pilotez un projet ou souhaitez simplement en savoir plus sur mon parcours ? Écrivez-moi quelques lignes et je vous répondrai dès que possible.</p>
                    <div class="contact-detail mt-5">
                        <span>Localisation</span>
                        <strong>Aix-en-Provence · région de Marseille</strong>
                    </div>
                    <div class="contact-detail">
                        <span>Réseau professionnel</span>
                        <a href="https://www.linkedin.com/in/hugo-marceau-ab6a74213/" target="_blank" rel="noopener noreferrer">Retrouvez-moi sur LinkedIn <span aria-hidden="true">↗</span></a>
                    </div>
                </aside>
            </div>
            <div class="col-12 col-lg-8">
                <div class="contact-card">
                        <div class="contact-card-heading">
                            <p class="section-eyebrow mb-2">Votre message</p>
                            <h2 class="h3 mb-2">Parlons de votre besoin</h2>
                            <p class="text-muted mb-0">Quelques informations suffisent pour démarrer l’échange.</p>
                        </div>
                        <div>

                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                        <div class="contact-card-body">

                            <form method="POST" action="{{ route("contact.send") }}" class="needs-validation" id="contactForm">
                                @csrf

                                {{-- Honeypot anti-spam (ne pas remplir) --}}
                                <div class="hp-wrap">
                                    <label for="company">Entreprise</label>
                                    <input type="text" id="company" name="company" tabindex="-1" autocomplete="off">
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Votre nom" value="{{ old('name') }}" required>
                                            <label for="name" class="required">Nom</label>
                                            <div class="invalid-feedback">Indiquez votre nom.</div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="nom@exemple.fr" value="{{ old('email') }}"  required>
                                            <label for="email" class="required">Email</label>
                                            <div class="invalid-feedback">Renseignez un email valide.</div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Sujet" value="{{ old('subject') }}">
                                            <label for="subject">Sujet (optionnel)</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-floating">
                                        <textarea class="form-control" id="message" name="message" style="height: 180px"
                                                  placeholder="Dites-moi ce que vous souhaitez..." maxlength="1200" required>{{ old('message') }}</textarea>
                                            <label for="message" class="required">Message</label>
                                            <div class="d-flex justify-content-between mt-2">
                                                <small class="form-helper">Partagez le contexte utile à votre message.</small>
                                                <small class="text-muted"><span id="charCount">0</span>/1200</small>
                                            </div>
                                            <div class="invalid-feedback">Le message est requis.</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="consent" name="consent" required>
                                            <label class="form-check-label required" for="consent">
                                                J’accepte que mes informations soient utilisées pour être recontacté.
                                            </label>
                                            <div class="invalid-feedback">Veuillez accepter pour envoyer.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-grid mt-4">
                                    <button type="submit" class="btn btn-gradient btn-lg" id="submitBtn">
                                        <span class="submit-label">Envoyer</span>
                                        <span class="spinner-border spinner-border-sm ms-2 d-none" role="status" aria-hidden="true"></span>
                                    </button>
                                </div>

                                <p class="text-center text-muted mt-3 mb-0" style="font-size:.9rem;">
                                    Je ne partage jamais vos informations. Vous pouvez demander leur suppression à tout moment.
                                </p>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </main>
@endsection
