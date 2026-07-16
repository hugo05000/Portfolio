<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\ClientAdminController;
use App\Http\Controllers\admin\ProfilAdminController;
use App\Http\Controllers\front\ContactController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\ProfilController;
use Illuminate\Support\Facades\Route;

// Index
Route::get('/', [HomeController::class, 'index'])->name('index');

// Mention légales
Route::get('/mentions-legales', function () {
    return view('pages.mentionsLegales');
})->name('mentions-legales');

Route::get('/politique-confidentialite', function () {
    return view('pages.politiqueConfidentialite');
})->name('politique-confidentialite');

// Profil
Route::get('/profil', [ProfilController::class, 'index'])->name('index.profil');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('index.contact');
Route::post('/contact', [ContactController::class, 'sendMail'])->name('contact.send');

// Connexion admin
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes admin
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.pages.dashboard');
    })->name('dashboard');

    // Profil
    Route::get('/profil/create', [ProfilAdminController::class, 'create'])->name('create.profil');
    // PROFIL
    Route::post('/profil', [ProfilAdminController::class, 'storeProfil'])->name('profil.store');
    Route::post('/profil/{profil}', [ProfilAdminController::class, 'updateProfil'])->name('profil.update');
    Route::delete('/profil/{profil}', [ProfilAdminController::class, 'deleteProfil'])->name('profil.delete');
    // EXPERIENCES
    Route::post('/experiences', [ProfilAdminController::class, 'storeExperiece'])->name('experiences.store');
    Route::post('/experiences/{experience}', [ProfilAdminController::class, 'updateExperiece'])->name('experiences.update');
    Route::delete('/experiences/{experience}', [ProfilAdminController::class, 'deleteExperiece'])->name('experiences.delete');
    // EDUCATIONS
    Route::post('/educations', [ProfilAdminController::class, 'storeEducation'])->name('educations.store');
    Route::post('/educations/{education}', [ProfilAdminController::class, 'updateEducation'])->name('educations.update');
    Route::delete('/educations/{education}', [ProfilAdminController::class, 'deleteEducation'])->name('educations.delete');
    // COMPETENCES
    Route::post('/competences', [ProfilAdminController::class, 'storeCompetence'])->name('competences.store');
    Route::post('/competences/{competence}', [ProfilAdminController::class, 'updateCompetence'])->name('competences.update');
    Route::delete('/competences/{competence}', [ProfilAdminController::class, 'deleteCompetence'])->name('competences.delete');

    //Client
    Route::get('/client/create', [ClientAdminController::class, 'create'])->name('create.client');
    Route::post('/client', [ClientAdminController::class, 'store'])->name('clients.store');    Route::post('/client/{client}', [ClientAdminController::class, 'update'])->name('clients.update');
    Route::delete('/client/{client}', [ClientAdminController::class, 'destroy'])->name('clients.destroy');

});

Route::get('/cron/mail-check/{token}', function ($token) {
    $secretToken = config('services.cron.token');

    if (!$secretToken || $token !== $secretToken) {
        abort(403, 'Accès refusé');
    }

    try {
        Artisan::call('mail:check');
        return "Cron exécuté avec succès !";
    } catch (\Exception $e) {
        return "Erreur : " . $e->getMessage();
    }
});
