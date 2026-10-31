<?php

use App\Http\Controllers\Api\AutoresController;
use App\Http\Controllers\Api\LibrosController;
use Illuminate\Support\Facades\Route;

Route::apiResource('autores', AutoresController::class);
Route::apiResource('libros', LibrosController::class);

// Endpoint personalizado para obtener libros de un autor con eager loading
Route::get('autores/{autore}/libros', [AutoresController::class, 'obtenerLibros']);