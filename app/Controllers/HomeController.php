<?php

namespace App\Controllers;
use App\Models\Task;

class HomeController extends Controller
{
    public function index()
    {
        $task = new Task();
        $tasks = $task->all();
        return $this->view('tasks.index',compact('tasks'));
    }
    public function show($id)
    {
        $task = new Task();
        
        return $task->find($id);
    }
    public function create()
    {
        return $this->view('tasks.create');
    }
    public function store()
    {
        $task = new Task();
        $data = $_POST;
        
        $task->create($data);
        header('Location: /tasks');
    }
    public function edit($id)
    {
        $task = new Task();
        
        return $task->find($id);
    }
    public function update($id, $data)
    {
        $task = new Task();
        
        return $task->update($id, $data);
    }
    public function delete($id)
    {
        $task = new Task();
        
        $task->delete($id);
        header('Location: /tasks');

    }
}
