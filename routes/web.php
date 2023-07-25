<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\dataGeneratorController;
use App\Http\Controllers\userPreferences;
use App\Http\Controllers\calculetedHours;
use App\Http\Controllers\pointRecords;
use App\Http\Controllers\reportsMonthly;
use Illuminate\Support\Facades\Route;

// Dashboard foi usado como tela principal do projeto "index"

Route::get('/', function () {
    return view('auth.login');
});


// Logout 
Route::get('/Sair', [AuthenticatedSessionController::class, 'destroy'])->name('destroy');

// Create metody hours 
Route::get('/dataGeneratorController', [dataGeneratorController::class, 'getDayTemplateByOdds']);

// reportsMonthly
Route::get('/Relatorios-Mensais', [reportsMonthly::class, 'reportsMonthly'])->name('reportsMonthly');


// listWoringHours 
Route::get('/Registrar-Ponto', [pointRecords::class, 'listWoringHours'])->name('registerPoint');

// clock In
Route::get('/Primeiro-Ponto-Batido', [pointRecords::class, 'insertHours'])->name('inserthours');
Route::get('/Bater-Demais-Pontos', [pointRecords::class, 'editHours'])->name('editHours');
Route::get('/Registrar-Editar-Ponto', [pointRecords::class, 'createOrEditRecord'])->name('createOrEditRecord');


// Theme Selection
Route::get('/Configuracoes', [userPreferences::class, 'themeSelection'])->name('themeSelection');
Route::get('/devTheme', [userPreferences::class, 'themeSelection'])->name('devTheme');
Route::get('/darkTheme', [userPreferences::class, 'themeSelection'])->name('darkTheme');
Route::get('/lithTheme', [userPreferences::class, 'themeSelection'])->name('lithTheme');
Route::get('/standardTheme', [userPreferences::class, 'themeSelection'])->name('standardTheme');


// teste
Route::get('/teste', [calculetedHours::class, 'getNextTime'])->name('teste');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
