<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DossierController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PaiementController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('dossiers/{dossier}/cocontactants', [DossierController::class,'coContactants'])->name('dossiers.cocontactants');
    Route::post('dossiers/{dossier}/cocontactants', [DossierController::class,'storeCoContactant'])->name('dossiers.cocontactants.store');

    Route::get('dossiers/{dossier}/frais', [DossierController::class,'frais'])->name('dossiers.frais');
    Route::post('dossiers/{dossier}/frais', [DossierController::class,'storeFrais'])->name('dossiers.frais.store');

    Route::get('dossiers/{dossier}/documents', [DossierController::class,'documents'])->name('dossiers.documents');
    Route::post('dossiers/{dossier}/documents', [DossierController::class,'storeDocument'])->name('dossiers.documents.store');
    
    Route::resource('clients', ClientController::class);
    Route::resource('dossiers', DossierController::class);
    Route::resource('documents', DocumentController::class);
    Route::resource('paiements', PaiementController::class);
});

require __DIR__.'/auth.php';
