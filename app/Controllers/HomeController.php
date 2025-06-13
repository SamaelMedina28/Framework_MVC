<?php

namespace App\Controllers;
use App\Models\Task;

class HomeController extends Controller
{
    public function index()
    {
        $task = new Task();
        $tasks = $task->paginate(3);
        // $tasks = $task->all();
        return $tasks;

        return $this->view('tasks.index',compact('tasks'));
    }
    public function show($id)
    {
        $task = new Task();
        $task = $task->find($id);
        return $this->view('tasks.show', compact('task'));
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
        $this->redirect('/tasks');
    }
    public function edit($id)
    {
        $task = new Task();
        $task = $task->find($id);
        return $this->view('tasks.edit', compact('task'));
    }
    public function update($id)
    {
        $task = new Task();
        $data = $_POST;
        $task->update($id, $data);
        $this->redirect('/tasks/'.$id); 
    }
    public function delete($id)
    {
        $task = new Task();
        $task->delete($id);
        $this->redirect('/tasks');

    }
}
