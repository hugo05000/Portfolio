<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Competences;
use App\Models\Experience;
use App\Models\Profil;

class HomeController extends Controller
{
    public function index()
    {
        $profil = Profil::first();
        $clients = Client::all();

        $experiences = Experience::orderByDesc('date_de_debut')
            ->limit(3)
            ->get();

        $interestVariants = [
            'Intérêt',
            'intérêt',
            'Intérêts',
            'intérêts',
            'Interet',
            'interet',
            'Interets',
            'interets',
            'Sport',
            'sport',
        ];

        $competences = Competences::whereNotIn('categorie', $interestVariants)
            ->orderBy('libelle')
            ->limit(10)
            ->get();

        return view('pages.index', compact('profil', 'clients', 'experiences', 'competences'));
    }
}
