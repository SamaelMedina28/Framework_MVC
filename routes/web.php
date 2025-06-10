<?php

use Lib\Route;

Route::get('/', function () {
    return 'Hola desde la ruta principal';
});
Route::get('/contacto', function () {
    return 'Hola desde la ruta contacto';
});
Route::get('/cursos/:slug', function ($slug) {
    return [
        'curso' => $slug,
        'precio' => 15000
    ];
});

Route::dispatch();