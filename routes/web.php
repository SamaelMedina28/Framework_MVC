<?php

use Lib\Route;
use App\Controllers\HomeController;

Route::get('/', function () {
    return HomeController::view('home');
});
//Mostrar todos
Route::get('/tasks', [HomeController::class, 'index']);
//Mostrar uno
Route::get('/tasks/:id', [HomeController::class, 'show']);
//Crear
Route::get('/tasks/create', [HomeController::class, 'create']);
//Guardar
Route::post('/tasks', [HomeController::class, 'store']);
// Editar
Route::get('/tasks/:id/edit', [HomeController::class, 'edit']);
// Actualizar
Route::post('/tasks/:id', [HomeController::class, 'update']);
// Eliminar
Route::post('/tasks/:id/delete', [HomeController::class, 'delete']);


Route::dispatch();