@extends('layout.app')

@section('title')
    Hugo MARCEAU - Prestations
@endsection

@section('meta_description', "Prestations proposées par Hugo Marceau : création de sites internet, montage de PC sur mesure et formation web pour débutants.")

@section('header')
    @include('layout.header', ['titre' => 'Les prestations proposées', 'description' => 'Développement de site web sur mesure, montage de PC sur mesure, formations WEB...'])
@endsection

@section('contenu')
    <div class="container py-5">
        <div class="mb-5">
            <div class="text-center">
                <h2 class="title-gradient-underline text-center fw-bold">Mes prestations</h2>
            </div>
            <div class="text-justify ">
                <p class="text-muted">
                    Développement web, montage de PC personnalisés et formation aux bases du développement... Des services conçus pour répondre avec précision à vos besoins techniques et numériques.
                </p>
                <p class="text-muted">
                    Que vous soyez particulier, entrepreneur ou professionnel, je m’adonne à la création, à l’optimisation et à l’accompagnement numérique, avec rigueur, clarté et un suivi personnalisé.
                </p>
                <i class="text-muted">
                    💡 Je ne fais pas que « répondre », je vous aide à avancer, à construire, à réussir.
                </i>
            </div>
        </div>

        <div class="row g-4">
            @forelse($prestations as $prestation)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        @php $carouselId = 'carousel-prestation-'.$prestation->id; @endphp

                        @if($prestation->photos->count() > 0)
                            <div id="{{ $carouselId }}" class="carousel slide" data-bs-ride="carousel">
                                @if($prestation->photos->count() > 1)
                                    <div class="carousel-indicators">
                                        @foreach($prestation->photos as $idx => $photo)
                                            <button type="button"
                                                    data-bs-target="#{{ $carouselId }}"
                                                    data-bs-slide-to="{{ $idx }}"
                                                    class="{{ $idx === 0 ? 'active' : '' }}"
                                                    @if($idx === 0) aria-current="true" @endif
                                                    aria-label="Slide {{ $idx + 1 }}"></button>
                                        @endforeach
                                    </div>
                                @endif

                                <div class="carousel-inner">
                                    @foreach($prestation->photos as $idx => $photo)
                                        <div class="carousel-item {{ $idx === 0 ? 'active' : '' }}">
                                            <img src="{{ asset('storage/'.$photo->source) }}"
                                                 class="d-block w-100"
                                                 style="height: 260px; object-fit: cover;"
                                                 loading="lazy"
                                                 alt="{{ $photo->alt ?: $prestation->libelle }}">
                                        </div>
                                    @endforeach
                                </div>

                                @if($prestation->photos->count() > 1)
                                    <button class="carousel-control-prev" type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Précédent</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Suivant</span>
                                    </button>
                                @endif
                            </div>
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height: 260px;">
                                <span class="text-muted">Aucune photo</span>
                            </div>
                        @endif

                        <div class="card-body p-4">
                            <h5 class="card-title fw-bold mb-2">{{ $prestation->libelle }}</h5>
                            <p class="card-text text-muted text-justify">{{ $prestation->description }}</p>
                        </div>

                        <div class="card-footer bg-transparent border-0 text-center pb-4">
                            <a href="{{ route('index.contact') }}" class="btn btn-gradient">Demander un devis</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-primary text-center">Aucune prestation disponible pour le moment.</div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
