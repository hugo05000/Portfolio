<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Competences;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Profil;
use Illuminate\Http\Request;
use Storage;

class ProfilAdminController extends Controller
{
    public function create()
    {
        $profil      = Profil::first() ?? Profil::create([
            'nom_prenom'        => 'Hugo MARCEAU',
            'ville'             => null,
            'date_de_naissance' => null,
            'en_tete'           => null,
            'resume'            => null,
            'photo_source'      => null,
        ]);
        $experiences = Experience::orderByDesc('date_de_debut')->get();
        $educations = Education::orderByDesc('annee_fin')->get();
        $competences = Competences::orderBy('categorie')->orderBy('libelle')->get();


        return view('admin.pages.profilAdmin', compact('profil', 'experiences', 'educations', 'competences'));
    }

    // ---------------- PROFIL ----------------

    public function storeProfil(Request $request)
    {
        // Si aucun profil n'existe, on en crée un (page unique)
        $profil = Profil::first();
        if ($profil) {
            return $this->updateProfil($request, $profil);
        }

        $data = $request->validate([
            'nom_prenom'        => ['required','string','max:255'],
            'ville'             => ['nullable','string','max:255'],
            'date_de_naissance' => ['nullable','date'],
            'en_tete'           => ['nullable','string','max:255'],
            'resume'            => ['nullable','string'],
            'photo'             => ['nullable','image','max:4096'],
        ]);

        if ($request->hasFile('photo')) {
            $data['photo_source'] = $request->file('photo')->store('profiles', 'public');
        }

        Profil::create($data);
        return back()->with('success', 'Profil créé.');
    }

    public function updateProfil(Request $request, Profil $profil = null)
    {
        $profil = $profil ?: Profil::firstOrFail();

        $data = $request->validate([
            'nom_prenom'        => ['required','string','max:255'],
            'ville'             => ['nullable','string','max:255'],
            'date_de_naissance' => ['nullable','date'],
            'en_tete'           => ['nullable','string','max:255'],
            'resume'            => ['nullable','string'],
            'photo'             => ['nullable','image','max:4096'],
        ]);

        if ($request->hasFile('photo')) {
            if ($profil->photo_source && Storage::disk('public')->exists($profil->photo_source)) {
                Storage::disk('public')->delete($profil->photo_source);
            }
            $data['photo_source'] = $request->file('photo')->store('profiles', 'public');
        }

        $profil->update($data);
        return back()->with('success', 'Profil mis à jour.');
    }

    public function deleteProfil(Profil $profil)
    {
        if ($profil->photo_source && Storage::disk('public')->exists($profil->photo_source)) {
            Storage::disk('public')->delete($profil->photo_source);
        }
        $profil->delete();
        return back()->with('success', 'Profil supprimé.');
    }

    // ---------------- EXPERIENCES ----------------

    public function storeExperiece(Request $request) // (orthographe conservée)
    {
        $data = $request->validate([
            'entreprise'     => ['required','string','max:255'],
            'titre'          => ['required','string','max:255'],
            'localisation'   => ['nullable','string','max:255'],
            'date_de_debut'  => ['required','date'],
            'date_de_fin'    => ['nullable','date','after_or_equal:date_de_debut'],
            'poste_actuel'   => ['nullable','string'],
            'description'    => ['nullable','string'],
        ]);
        $data['poste_actuel'] = (bool)($data['poste_actuel'] ?? false);

        Experience::create($data);
        return back()->with('success', 'Expérience ajoutée.');
    }

    public function updateExperiece(Request $request, Experience $experience)
    {
        $data = $request->validate([
            'entreprise'     => ['required','string','max:255'],
            'titre'          => ['required','string','max:255'],
            'localisation'   => ['nullable','string','max:255'],
            'date_de_debut'  => ['required','date'],
            'date_de_fin'    => ['nullable','date','after_or_equal:date_de_debut'],
            'poste_actuel'   => ['nullable','string'],
            'description'    => ['nullable','string'],
        ]);
        $data['poste_actuel'] = (bool)($data['poste_actuel'] ?? false);

        $experience->update($data);
        return back()->with('success', 'Expérience mise à jour.');
    }

    public function deleteExperiece(Experience $experience)
    {
        $experience->delete();
        return back()->with('success', 'Expérience supprimée.');
    }

    // ---------------- EDUCATION ----------------

    public function storeEducation(Request $request)
    {
        $data = $request->validate([
            'diplome'      => ['required','string','max:255'],
            'ecole'        => ['nullable','string','max:255'],
            'details'      => ['nullable','string','max:500'],
            'annee_debut'  => ['required','integer','min:1950','max:2100'],
            'annee_fin'    => ['required','integer','min:1950','max:2100'],
        ]);

        Education::create($data);
        return back()->with('success', 'Formation ajoutée.');
    }

    public function updateEducation(Request $request, Education $education)
    {
        $data = $request->validate([
            'diplome'      => ['required','string','max:255'],
            'ecole'        => ['nullable','string','max:255'],
            'details'      => ['nullable','string','max:500'],
            'annee_debut'  => ['required','integer','min:1950','max:2100'],
            'annee_fin'    => ['required','integer','min:1950','max:2100'],
        ]);

        $education->update($data);
        return back()->with('success', 'Formation mise à jour.');
    }

    public function deleteEducation(Education $education)
    {
        $education->delete();
        return back()->with('success', 'Formation supprimée.');
    }

    // ---------------- COMPÉTENCES ----------------

    public function storeCompetence(Request $request)
    {
        $data = $request->validate([
            'libelle'   => ['required','string','max:255'],
            'categorie' => ['nullable','string','max:255'],
        ]);

        Competences::create($data);
        return back()->with('success', 'Compétence ajoutée.');
    }

    public function updateCompetence(Request $request, Competences $competence)
    {
        $data = $request->validate([
            'libelle'   => ['required','string','max:255'],
            'categorie' => ['nullable','string','max:255'],
        ]);

        $competence->update($data);
        return back()->with('success', 'Compétence mise à jour.');
    }

    public function deleteCompetence(Competences $competence)
    {
        $competence->delete();
        return back()->with('success', 'Compétence supprimée.');
    }
}
