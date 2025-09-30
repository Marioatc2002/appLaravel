<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Página principal
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Rutas de courses (TestController)
Route::prefix('courses')->name('courses.')->group(function () {
    Route::get('/', [TestController::class, 'index'])->name('index');          // Listar todos los cursos
    Route::get('/create', [TestController::class, 'create'])->name('create');  // Formulario creación
    Route::post('/', [TestController::class, 'store'])->name('store');         // Guardar curso nuevo
    Route::get('/{course}', [TestController::class, 'read'])->name('read');    // Mostrar curso
    Route::get('/{course}/edit', [TestController::class, 'edit'])->name('edit'); // Formulario edición
    Route::put('/{course}', [TestController::class, 'update'])->name('update');  // Actualizar curso
    Route::delete('/{course}', [TestController::class, 'delete'])->name('delete'); // Eliminar curso
});

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
