<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\AlumnosController;


Route::resource('alumnos', AlumnosController::class);

use App\Http\Controllers\TareaController;

Route::resource('tareas', TareaController::class);

