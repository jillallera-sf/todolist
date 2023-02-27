<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TodoRepository;

class TodolistController extends Controller
{
    protected $todo;

    function __construct(TodoRepository $todo){
        $this->todo = $todo;
    }

   
    function list(){
        $tasks = $this->todo->getTaskList();
        return view('list', compact('tasks'));
    }

    function saveTask(Request $request){
        $data = [
        'task'=> $request->task,
        'due'=>$request->taskdue
       ];

       $this->todo->saveTask($data);

       return back();
    }

    function deleteTask($id){
        $this->todo->deleteTask($id);
        return back();
    }

    function updateTask($id){
        $task = $this->todo->getTask($id);
        return view('edit-list', compact('task'));
    }

    function saveEdit(Request $request){
        $data = [
            'task' => $request->edit,
            'due' =>$request->editdue
        ];

        $this->todo->updateTask($data, $request->id);
    
        return redirect()->route('list');
    }



    function updateChecked($id){
        $task = $this->todo->getCheck($id);
        return view('list', compact('task'));
    }


    function saveChecked(Request $request, $id){
        $data = [
            'is_checked' => $request->is_checked,
        ];

        $this->todo->updateChecked($data, $request->id);
        return back();
    }

}
