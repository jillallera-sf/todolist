<?php

namespace App\Repositories;
use App\Models\Todo;

class TodoRepository {
    /**
     * @var Todo $todo
     */
    protected $todo;

    function __construct(Todo $todo){
        $this->todo = $todo;
    }

     function getTaskList() {
        return $this->todo->get();
     }

    public function saveTask($data){
        return $this->todo->create($data);
     }

    public function deleteTask($id){
        return $this->todo->destroy($id);
    }

    public function getTask($id) {
        return $this->todo->find($id);
    }

    public function updateTask($data, $id){
        $task = $this->todo->find($id);

        $task->update($data);
    }


    //saving checked checkbox
    public function getCheck($id) {
        return $this->todo->find($id);
    }

    //updating checked
    public function updateChecked($data, $id){
        $task = $this->todo->find($id);

        $task->update($data);
    }
}