@extends('layout.app')

@section('title')
    Hugo MARCEAU - Contact
@endsection

@section('meta_description', "Contactez Hugo MARCEAU pour des prestations de développement WEB, des montages et des réparations de PC, des formations aux bases du développement WEB...")

@section('header')

    @include('layout.header', ['titre' => 'Me contacter', 'description' => 'Rentrons en contact et discutons...'])

@endsection

@section('contenu')
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xxl-8">
                    <div class="card">
                        <div class="card-header text-center py-4">
                            <h2 class="mb-1">Envoyez-moi un message</h2>
                            <p class="text-muted text-justify mb-0">N’hésitez pas à me contacter, je me charge de vous répondre aussi vite que possible. Votre satisfaction, c’est ma priorité !</p>
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
                        <div class="card-body p-4 p-md-5">

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

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <select class="form-select" id="motif" name="motif" required>
                                                <option {{ old('motif') == '' ? 'selected' : '' }} disabled>— Choisissez un motif —</option>
                                                <option value="site-internet" {{ old('motif') == 'site-internet' ? 'selected' : '' }}>Création de site internet</option>
                                                <option value="pc-sur-mesure" {{ old('motif') == 'pc-sur-mesure' ? 'selected' : '' }}>Montage d'un PC sur mesure</option>
                                                <option value="formation-web" {{ old('motif') == 'formation-web' ? 'selected' : '' }}>Formation web débutant</option>
                                                <option value="autre" {{ old('motif') == 'autre' ? 'selected' : '' }}>Autre motif</option>
                                            </select>
                                            <label for="motif" class="required">Motif du contact</label>
                                            <div class="invalid-feedback">Sélectionnez un motif.</div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Sujet (optionnel)" value="{{ old('subject') }}">
                                            <label for="subject">Sujet (optionnel)</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-floating">
                                        <textarea class="form-control" id="message" name="message" style="height: 180px"
                                                  placeholder="Dites-moi ce que vous souhaitez..." maxlength="1200" required>{{ old('message') }}</textarea>
                                            <label for="message" class="required">Message</label>
                                            <div class="d-flex justify-content-between mt-2">
                                                <small class="form-helper">Partagez vos besoins, délais, budget indicatif…</small>
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
        </div>
    </div>
@endsection
