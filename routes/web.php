<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\TareaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource('alumnos', AlumnosController::class);
});

Route::get('tareas', [TareaController::class, 'index'])->name('tareas.index');

Route::middleware('auth')->group(function () {
    Route::get('tareas/create', [TareaController::class, 'create'])->name('tareas.create');
    Route::post('tareas', [TareaController::class, 'store'])->name('tareas.store');
    Route::get('tareas/{tarea}/edit', [TareaController::class, 'edit'])->name('tareas.edit');
    Route::put('tareas/{tarea}', [TareaController::class, 'update'])->name('tareas.update');
    Route::delete('tareas/{tarea}', [TareaController::class, 'destroy'])->name('tareas.destroy');
});

Route::get('tareas/{tarea}', [TareaController::class, 'show'])->name('tareas.show');

require __DIR__.'/auth.php';
