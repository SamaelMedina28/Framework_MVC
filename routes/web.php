<?php

use Lib\Route;
use App\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
//Mostrar todos
Route::get('/contacts', [HomeController::class, 'index']);
//Mostrar uno
Route::get('/contacts/:id', [HomeController::class, 'show']);
//Crear
Route::get('/contacts/create', [HomeController::class, 'create']);
//Guardar
Route::post('/contacts', [HomeController::class, 'store']);
// Editar
Route::get('/contacts/:id/edit', [HomeController::class, 'edit']);
// Actualizar
Route::post('/contacts/:id', [HomeController::class, 'update']);
// Eliminar
Route::post('/contacts/:id/delete', [HomeController::class, 'delete']);


Route::dispatch();