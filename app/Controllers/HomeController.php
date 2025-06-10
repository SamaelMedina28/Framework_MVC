<?php

namespace App\Controllers;
use App\Models\Task;

class HomeController extends Controller
{
    public function index()
    {
        $task = new Task();
        return $task->create([
            'titulo' => 'Titulo de prueba',
            'descripcion' => 'Descripcion de prueba',
            'estado' => 'completada',
            'fecha_limite' => '2025-06-10'
        ]);
    }
}
