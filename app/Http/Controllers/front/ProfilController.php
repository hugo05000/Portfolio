<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Competences;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Profil;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = Profil::first();

        $experiences = Experience::orderByDesc('date_de_debut')
            ->get();

        $educations = Education::orderByDesc('annee_fin')
            ->get();

        $allCompetences = Competences::all();

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
        $competences = $allCompetences->whereNotIn('categorie', $interestVariants);
        $interets = $allCompetences->whereIn('categorie', $interestVariants);

        return view('pages.profil', compact('profil', 'experiences', 'educations', 'competences', 'interets'));
    }
}
