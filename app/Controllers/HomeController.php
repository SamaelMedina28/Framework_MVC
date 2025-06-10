<?php

namespace App\Controllers;
use App\Models\Task;

class HomeController extends Controller
{
    public function index()
    {
        $task = new Task();
        return $task->all();
    }
}
