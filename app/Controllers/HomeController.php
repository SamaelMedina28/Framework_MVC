<?php

namespace App\Controllers;
use App\Models\Task;

class HomeController extends Controller
{
    public function index()
    {
        $task = new Task();
        return $task->update(20, [
            'titulo' => 'Titulo editado 2',
            'descripcion' => 'Descripcion editada 2',
            'estado' => 'completada',
            'fecha_limite' => '2025-06-15'
        ]);
    }
}
