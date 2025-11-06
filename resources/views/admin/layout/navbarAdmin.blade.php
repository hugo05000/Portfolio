<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('dashboard')}}">{{ Auth::user()->user }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mx-md-2">
                    <a class="nav-link" href="{{ route('create.prestation') }}">Prestations</a>
                </li>
                <li class="nav-item mx-md-2">
                    <a class="nav-link" href="{{ route('create.profil') }}">Profil</a>
                </li>
            </ul>
        </div>
        <form action="{{ route('logout') }}" method="POST" class="ml-auto">
            @csrf
            <button type="submit" class="btn btn-danger">Déconnexion</button>
        </form>
    </div>
</nav>

