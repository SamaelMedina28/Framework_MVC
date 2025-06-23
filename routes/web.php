<?php

use Lib\Route;
use App\Controllers\HomeController;

Route::get('/', function () {
    return view('home');
});
//Mostrar todos
Route::get('/tasks', [HomeController::class, 'index']);
//Crear
Route::get('/tasks/create', [HomeController::class, 'create']);
//Mostrar uno
Route::get('/tasks/:id', [HomeController::class, 'show']);
//Guardar
Route::post('/tasks', [HomeController::class, 'store']);
// Editar
Route::get('/tasks/:id/edit', [HomeController::class, 'edit']);
// Actualizar
Route::post('/tasks/:id', [HomeController::class, 'update']);
// Eliminar
Route::post('/tasks/:id/delete', [HomeController::class, 'delete']);


Route::dispatch();