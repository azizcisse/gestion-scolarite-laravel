<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ParentEleveController;
use App\Http\Controllers\AnneeScolaireController;
use App\Http\Controllers\FraisController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('niveaux')->group(function(){
        Route::get('/', [NiveauController::class, 'index'])->name('niveaux');
        Route::get('/creer-niveau', [NiveauController::class, 'create'])->name('niveaux.creer_niveaux');
        Route::get('/edit-niveau/{niveauScolaire}', [NiveauController::class, 'edit'])->name('niveaux.edit_niveaux');
    });

    Route::prefix('configurations')->group(function(){
        Route::get('/', [AnneeScolaireController::class, 'index'])->name('configurations');
        Route::get('/creer-annee-scolaire', [AnneeScolaireController::class, 'create'])->name('configurations.creer_annee_scolaire');   
    });

    Route::prefix('classes')->group(function(){
        Route::get('/', [ClasseController::class, 'index'])->name('classes');
        Route::get('/create', [ClasseController::class, 'create'])->name('classes.create');
        Route::get('/edit-classe/{classeScolaire}', [ClasseController::class, 'edit'])->name('classes.edit_classe');
    });

    Route::prefix('eleves')->group(function(){
        Route::get('/', [EleveController::class, 'index'])->name('eleves');
        Route::get('/create', [EleveController::class, 'create'])->name('eleves.create');
        Route::get('/{eleve}', [EleveController::class, 'show'])->name('eleves.show_eleve');
        Route::get('/edit-eleve/{eleve}', [EleveController::class, 'edit'])->name('eleves.edit_eleve');
    });

    Route::prefix('inscriptions')->group(function(){
        Route::get('/', [InscriptionController::class, 'index'])->name('inscriptions');
        Route::get('/create', [InscriptionController::class, 'create'])->name('inscriptions.create');
        Route::get('/edit/{inscription}', [InscriptionController::class, 'edit'])->name('inscriptions.edit_inscription');
    });

    Route::prefix('paiements')->group(function(){
        Route::get('/', [PaiementController::class, 'index'])->name('paiements');
        Route::get('/create', [PaiementController::class, 'create'])->name('paiements.create_paiement');
        Route::get('/edit/{paiement}', [PaiementController::class, 'edit'])->name('paiements.edit_paiement');
    });

    Route::prefix('parent_eleves')->group(function(){
        Route::get('/', [ParentEleveController::class, 'index'])->name('parent_eleves');
        Route::get('/create', [ParentEleveController::class, 'create'])->name('parent_eleves.create_parent_eleve');
        Route::get('/edit/{parentEleve}', [ParentEleveController::class, 'edit'])->name('parent_eleves.edit_parent_eleve');
    });

    Route::prefix('frais_scolarites')->group(function(){
        Route::get('/', [FraisController::class, 'index'])->name('frais_scolarites');
        Route::get('/create', [FraisController::class, 'create'])->name('frais_scolarites.create_frais');
        Route::get('/edit{frais}', [FraisController::class, 'edit'])->name('frais_scolarites.edit_frais');
    });
});
