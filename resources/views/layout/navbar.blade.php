<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Hugo MARCEAU</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mx-md-2">
                    <a class="nav-link" href="{{ route('index.profil') }}">Profil</a>
                </li>
                <li class="nav-item mx-md-2">
                    <a class="nav-link" href="{{ route('index.prestations') }}">Prestations</a>
                </li>
                <li class="nav-item mx-md-2">
                    <a class="nav-link" href="{{ route('index.contact') }}">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
