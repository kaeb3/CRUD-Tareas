<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\TareaController;
use Illuminate\Support\Facades\Route;

// Página principal
Route::get('/', function () {
    return view('welcome');
});

// Dashboard (solo usuarios autenticados y verificados)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas de perfil (solo usuarios autenticados)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// CRUD de Alumnos (solo usuarios logueados)
Route::middleware('auth')->group(function () {
    Route::resource('alumnos', AlumnosController::class);
});

// CRUD de Tareas

// 1️⃣ Rutas públicas: cualquiera puede ver listado y detalle
Route::get('tareas', [TareaController::class, 'index'])->name('tareas.index');
Route::get('tareas/{tarea}', [TareaController::class, 'show'])->name('tareas.show');

// 2️⃣ Rutas protegidas: crear, editar, eliminar solo para usuarios logueados
Route::middleware('auth')->group(function () {
    Route::get('tareas/create', [TareaController::class, 'create'])->name('tareas.create');
    Route::post('tareas', [TareaController::class, 'store'])->name('tareas.store');
    Route::get('tareas/{tarea}/edit', [TareaController::class, 'edit'])->name('tareas.edit');
    Route::put('tareas/{tarea}', [TareaController::class, 'update'])->name('tareas.update');
    Route::delete('tareas/{tarea}', [TareaController::class, 'destroy'])->name('tareas.destroy');
});

// Rutas de autenticación de Breeze
require __DIR__.'/auth.php';
