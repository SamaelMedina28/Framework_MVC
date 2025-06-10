<?php

use Lib\Route;

Route::get('/', function () {
    echo 'Hola desde la ruta principal';
});

Route::get('/about', function () {
    echo 'Hola desde la ruta about';
});

Route::dispatch();