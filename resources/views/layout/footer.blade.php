<footer class="bg-light text-center text-lg-start border-top mt-5">
    <div class="container py-4">
        <div class="row gy-3 align-items-center">

            <!-- Identité -->
            <div class="col-12 col-md-4 text-md-start">
                <strong>Hugo MARCEAU</strong><br>
                Auto-entrepreneur<br>
                SIRET : 991 648 536 00019
            </div>

            <!-- Copyright -->
            <div class="col-12 col-md-4 text-center">
                <small>&copy; {{ date('Y') }} Hugo MARCEAU — Tous droits réservés</small>
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
</footer>
