<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;  // Add this line
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DeskController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');  // Add this line
    
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    
    
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/* dev, switch to auth */

Route::get('desk_api/index', [DeskController::class, 'index'])
        ->name('desk.index');
    
    Route::get('desk_api/{id}', [DeskController::class, 'show'])
        ->name('desk.show');
        
    Route::get('desk_api/update/{id}', [DeskController::class, 'update'])
        ->name('desk.update');