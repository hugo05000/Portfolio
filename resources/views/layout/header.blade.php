<div class="wrapper {{ request()->routeIs('index') ? 'wrapper-home' : 'wrapper-inner' }}">
    <div class="content">
        <p class="wrapper-kicker">Hugo Marceau <span aria-hidden="true">/</span> Responsable applicatif</p>
        <h1>{{ $titre }}</h1>
        <p class="subtitle">{{ $description }}</p>
        <a class="arrow-down" href="#main-content" aria-label="Découvrir le contenu de la page">
            <span>Découvrir</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M12 4v16m-6-6 6 6 6-6"></path>
            </svg>
        </a>
    </div>
</div>
