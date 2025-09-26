<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí definimos todas las rutas web de la aplicación.
|
*/

// Página principal
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Dashboard protegido por autenticación y verificación de email
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rutas de perfil
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });

    // Ruta para listar todos los usuarios
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
});

// Rutas de autenticación (login, register, etc.)
require __DIR__.'/auth.php';
