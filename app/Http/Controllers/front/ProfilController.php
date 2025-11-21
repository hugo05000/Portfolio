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

        $competenceVariants = [
            'Compétence',
            'competence',
            'compétence',
            'Compétences',
            'compétences',
            'competences',
        ];
        $competences = $allCompetences->whereIn('categorie', $competenceVariants);
        $interets = $allCompetences->whereNotIn('categorie',$competenceVariants);

        return view('pages.profil', compact('profil', 'experiences', 'educations', 'competences', 'interets'));
    }
}
