@extends('admin.layout.appAdmin')

@section('contenu')
    <div class="container py-4">
        <div class="row g-4">
            <div class="col-12 col-md-3">
                <a href="{{ route('create.prestation') }}" class="text-decoration-none d-block">
                    <div class="card h-100 text-center p-4 border-0 shadow-sm">
                        <div class="fw-bold h5">Prestations</div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-3">
                <a href="{{ route('create.profil') }}" class="text-decoration-none d-block">
                    <div class="card h-100 text-center p-4 border-0 shadow-sm">
                        <div class="fw-bold h5">Profil</div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-3">
                <a href="{{ route('create.client') }}" class="text-decoration-none d-block">
                    <div class="card h-100 text-center p-4 border-0 shadow-sm">
                        <div class="fw-bold h5">Client</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
