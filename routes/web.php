<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\dataGeneratorController;
use App\Http\Controllers\userPreferences;
use App\Http\Controllers\users;
use App\Http\Controllers\calculetedHours;
use App\Http\Controllers\pointRecords;
use App\Http\Controllers\reportManagement;
use App\Http\Controllers\reportsMonthly;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () { 

// Dashboard foi usado como tela principal do projeto "index"

Route::get('/', function () {
    return view('auth.login');
});


// Logout 
Route::get('/Sair', [AuthenticatedSessionController::class, 'destroy'])->name('destroy');


// reportsMonthly
 Route::get('/Relatorios-Mensais', [reportsMonthly::class, 'reportsMonthly'])->name('reportsMonthly');
 Route::post('/Filtrando-Relatorios', [reportsMonthly::class, 'reportsMonthly'])->name('testando');


// managementReport
Route::get('/Relatorios-Gerencial', [reportManagement::class, 'reportManagement'])->name('reportManagement');

// listWoringHours 
Route::get('/Registrar-Ponto', [pointRecords::class, 'listWoringHours'])->name('registerPoint');

// clock In
Route::get('/Primeiro-Ponto-Batido', [pointRecords::class, 'insertHours'])->name('inserthours');
Route::get('/Bater-Demais-Pontos', [pointRecords::class, 'editHours'])->name('editHours');
Route::get('/Registrar-Editar-Ponto', [pointRecords::class, 'createOrEditRecord'])->name('createOrEditRecord');


// Theme Selection
Route::get('/Configuracoes', [userPreferences::class, 'themeSelection'])->name('themeSelection');
Route::get('/devTheme', [userPreferences::class, 'themeSelection'])->name('devTheme');
Route::get('/temaNoturno', [userPreferences::class, 'themeSelection'])->name('darkTheme');
Route::get('/temaMinimalistico', [userPreferences::class, 'themeSelection'])->name('lithTheme');
Route::get('/temaPadrao', [userPreferences::class, 'themeSelection'])->name('standardTheme');


// Users
Route::get('/Usuarios', [users::class, 'users'])->name('users');





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
