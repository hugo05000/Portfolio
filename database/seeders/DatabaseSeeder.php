<?php

namespace Database\Seeders;

use App\Models\Competences;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Profil;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['user' => 'hugo'],
            ['password' => Hash::make('test')]
        );

        Profil::updateOrCreate(
            ['nom_prenom' => 'Hugo MARCEAU'],
            [
                'ville' => 'Aix-en-Provence',
                'date_de_naissance' => '2001-01-15',
                'en_tete' => 'Responsable applicatif SI Retraite · CPRPF',
                'resume' => "Responsable applicatif au sein du SI Retraite de la CPRPF, je suis en charge d'un périmètre applicatif de bout en bout : analyse des besoins utilisateurs, rédaction des spécifications techniques, conception et suivi des développements, pilotage des tests et des mises en production. Issu d'une formation MIAGE et d'un parcours de développeur web, je m'appuie sur cette culture technique pour dialoguer efficacement avec les équipes de développement comme avec les métiers.",
            ]
        );

        Experience::query()->delete();
        Education::query()->delete();
        Competences::query()->delete();

        Experience::create([
            'entreprise' => 'CPRPF',
            'titre' => 'Responsable applicatif SI Retraite',
            'localisation' => 'Marseille',
            'date_de_debut' => '2025-10-01',
            'date_de_fin' => null,
            'poste_actuel' => true,
            'description' => "En charge du périmètre applicatif du SI Retraite : analyse des besoins utilisateurs, rédaction des spécifications techniques, conception et suivi des développements, pilotage des tests et des mises en production. Coordination de la maintenance applicative, gestion de la relation métier et accompagnement au déploiement des nouvelles fonctionnalités. Projets menés en SCRUM dans un cadre SAFe.",
        ]);

        Experience::create([
            'entreprise' => 'TechnicAtome',
            'titre' => 'Responsable applicatif CAO (alternance)',
            'localisation' => 'Aix-en-Provence',
            'date_de_debut' => '2023-09-01',
            'date_de_fin' => '2025-09-26',
            'poste_actuel' => false,
            'description' => "Pilotage opérationnel du domaine des logiciels de conception assistée par ordinateur (CAO) : suivi applicatif, coordination avec les éditeurs et les équipes internes, support aux utilisateurs. Gestion de projet en cycle en V.",
        ]);

        Experience::create([
            'entreprise' => 'Entreprise à renseigner',
            'titre' => 'Développeur web full-stack (alternance)',
            'localisation' => 'Région PACA',
            'date_de_debut' => '2022-09-01',
            'date_de_fin' => '2023-08-31',
            'poste_actuel' => false,
            'description' => "Développement web full-stack avec Laravel et son ORM Eloquent : développement des outils internes et du site de l'entreprise, de la modélisation des données à l'intégration front.",
        ]);

        Experience::create([
            'entreprise' => 'Drop Sud',
            'titre' => 'Stagiaire en développement logiciel',
            'localisation' => 'Région PACA',
            'date_de_debut' => '2022-01-01',
            'date_de_fin' => '2022-02-28',
            'poste_actuel' => false,
            'description' => "Développement d'un site web de vente de pièces automobiles pour la plateforme Drop Sud, ainsi que d'un logiciel de gestion du site à destination du service marketing. Réalisation avec WinDev et WebDev.",
        ]);

        Education::create([
            'diplome' => 'Master MIAGE',
            'ecole' => 'Aix-Marseille Université',
            'details' => 'Méthodes informatiques appliquées à la gestion des entreprises : double compétence informatique et management des systèmes d\'information.',
            'annee_debut' => 2023,
            'annee_fin' => 2025,
        ]);

        Education::create([
            'diplome' => 'BTS SIO',
            'ecole' => 'Lycée Dominique Villars',
            'details' => 'Services Informatiques aux Organisations.',
            'annee_debut' => 2020,
            'annee_fin' => 2022,
        ]);

        $competences = [
            ['libelle' => 'Analyse des besoins', 'categorie' => 'Pilotage applicatif'],
            ['libelle' => 'Spécifications techniques', 'categorie' => 'Pilotage applicatif'],
            ['libelle' => 'Suivi des développements', 'categorie' => 'Pilotage applicatif'],
            ['libelle' => 'Pilotage des tests', 'categorie' => 'Pilotage applicatif'],
            ['libelle' => 'Mises en production', 'categorie' => 'Pilotage applicatif'],
            ['libelle' => 'Maintenance applicative', 'categorie' => 'Pilotage applicatif'],
            ['libelle' => 'Relation métier', 'categorie' => 'Pilotage applicatif'],
            ['libelle' => 'SCRUM / SAFe', 'categorie' => 'Méthodes'],
            ['libelle' => 'Cycle en V', 'categorie' => 'Méthodes'],
            ['libelle' => 'SQL Server', 'categorie' => 'Compétences techniques'],
            ['libelle' => 'MySQL', 'categorie' => 'Compétences techniques'],
            ['libelle' => 'PHP / Laravel', 'categorie' => 'Compétences techniques'],
            ['libelle' => 'Docker', 'categorie' => 'Compétences techniques'],
            ['libelle' => 'Git', 'categorie' => 'Compétences techniques'],
            ['libelle' => 'Veille technologique', 'categorie' => 'Intérêts'],
            ['libelle' => 'Cyclisme', 'categorie' => 'Intérêts'],
        ];

        foreach ($competences as $competence) {
            Competences::create($competence);
        }
    }
}
