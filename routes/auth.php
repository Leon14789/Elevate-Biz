<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;




Route::middleware('guest')->group(function () {

    
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    
});

Route::middleware('auth')->group(function () {

    Route::get('Criar-Novo-Registro', [RegisteredUserController::class, 'create'])
    ->name('register');

    Route::post('Criar-Novo-Registro', [RegisteredUserController::class, 'store']);

    Route::get('Confirmacao-Para-Deletar/{id}', [RegisteredUserController::class, 'delete'])->name('delete');
    Route::DELETE('Cadastro/{id}', [RegisteredUserController::class, 'destroyUser'])->name('destroyUser');

    Route::get('Mostrar-Usuario/{id}/', [RegisteredUserController::class, 'edit'])->name('edit');

    Route::put('Editar-Usuario/{id}/', [RegisteredUserController::class, 'update'])->name('update');


    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
