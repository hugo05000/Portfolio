<div class="site-footer">
    <div class="container py-5">
        <div class="row gy-3 align-items-center">

            <!-- Identité -->
            <div class="col-12 col-md-4 text-md-start">
                <strong>Hugo Marceau</strong><br>
                <span>Responsable applicatif · Aix-en-Provence</span>
            </div>

            <!-- Copyright -->
            <div class="col-12 col-md-4 text-center">
                <small>&copy; {{ date('Y') }} Hugo Marceau</small><br>
                <!-- Boutons sociaux -->
                <div class="d-flex justify-content-center mt-2 mb-2">
                    <a href="https://github.com/hugo05000" target="_blank" rel="noopener noreferrer" class="me-3" aria-label="Profil GitHub de Hugo Marceau">
                        <img src="{{ asset('images/github-mark.svg') }}" alt="GitHub" class="social-icon">
                    </a>
                    <a href="https://www.linkedin.com/in/hugo-marceau-ab6a74213/" target="_blank" rel="noopener noreferrer" aria-label="Profil LinkedIn de Hugo Marceau">
                        <img src="{{ asset('images/linkedin.svg') }}" alt="Linkedin" class="social-icon">
                    </a>
                </div>
            </div>

            <!-- Liens -->
            <div class="col-12 col-md-4 text-md-end">
                <ul class="list-unstyled mb-0">
                    <li>
                        <a href="{{ route('mentions-legales') }}" class="text-decoration-none text-secondary">
                            Mentions légales
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('politique-confidentialite') }}" class="text-decoration-none text-secondary">
                            Politique de confidentialité
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('index.contact') }}" class="text-decoration-none text-secondary">
                            Page de contact
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
