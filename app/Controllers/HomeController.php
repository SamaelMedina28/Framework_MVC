<?php

namespace App\Controllers;
use App\Models\Task;

class HomeController extends Controller
{
    public function index()
    {
        $task = new Task();

        if(isset($_GET['search'])){
            $tasks = $task->where('titulo', 'like', '%'.$_GET['search'].'%')->orderBy('id','DESC')->paginate(3);
        }else{
            $tasks = $task->orderBy('id','DESC')->paginate(3);
        }
        return view('tasks.index',compact('tasks'));
    }
    public function show($id)
    {
        $task = new Task();
        $task = $task->find($id);
        return view('tasks.show', compact('task'));
    }
    public function create()
    {
        return view('tasks.create');
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
        return view('tasks.edit', compact('task'));
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
