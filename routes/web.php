<?php

use Lib\Route;
use App\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/contacto', function () {
    return "Contacto";
});
Route::get('/cursos/:slug', function ($slug) {
    return [
        'curso' => $slug,
        'precio' => 15000
    ];
});

Route::dispatch();