<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\dataGeneratorController;
use App\Http\Controllers\pointRecords;
use App\Http\Controllers\reportsMonthly;
use Illuminate\Support\Facades\Route;

// Dashboard foi usado como tela principal do projeto "index"

Route::get('/', function () {
    return view('auth.login');
});


// Logout 
Route::get('/AuthenticatedSessionController', [AuthenticatedSessionController::class, 'destroy'])->name('destroy');

// Create metody hours 
Route::get('/dataGeneratorController', [dataGeneratorController::class, 'getDayTemplateByOdds']);

// reportsMonthly
Route::get('/Relatorios-Mensais', [reportsMonthly::class, 'teste'])->name('reportsMonthly');


// listWoringHours 
Route::get('/Registrar-Ponto', [pointRecords::class, 'listWoringHours'])->name('registerPoint');

// clock In
Route::get('/Primeiro-Ponto-Batido', [pointRecords::class, 'insertHours'])->name('inserthours');

// functionality to change times2,3 and 4 fields
Route::get('/Bater-Demais-Pontos', [pointRecords::class, 'editHours'])->name('editHours');

Route::get('/Registrar-Editar-Ponto', [pointRecords::class, 'createOrEditRecord'])->name('createOrEditRecord');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
