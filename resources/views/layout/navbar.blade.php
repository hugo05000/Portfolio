<nav class="navbar navbar-expand-lg navbar-light site-nav" aria-label="Navigation principale">
    <div class="container">
        <a class="navbar-brand site-brand" href="{{ route('index') }}" aria-label="Hugo Marceau, accueil"><span class="brand-mark" aria-hidden="true">HM<span>.</span></span><span>Hugo Marceau</span></a>
        <button class="navbar-toggler menu-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Menu de navigation">
            <span class="menu-toggle-label">Menu</span>
            <span class="menu-toggle-icon" aria-hidden="true"><span></span><span></span></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mx-md-2">
                    <a class="nav-link {{ request()->routeIs('index.profil') ? 'active' : '' }}" href="{{ route('index.profil') }}" @if(request()->routeIs('index.profil')) aria-current="page" @endif>Profil</a>
                </li>
                <li class="nav-item mx-md-2">
                    <a class="nav-link {{ request()->routeIs('index.contact') ? 'active' : '' }}" href="{{ route('index.contact') }}" @if(request()->routeIs('index.contact')) aria-current="page" @endif>Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
