<?php

namespace App\Repositories;
use App\Models\Subtask;

class SubtaskRepository {
    /**
     * @var Subtask $subtask
     */
    protected $subtask;

    function __construct(Subtask $subtask){
        $this->subtask = $subtask;
    }

    public function saveSubtask($data){
        return $this->subtask->create($data);
    }

    public function getSubtask(){
        return $this->subtask->all();
    }

    public function deleteSubtask($id){
        return $this->subtask->destroy($id);
    }

    public function getTask($id){
        return $this->subtask->find($id);
    }

    public function updateSubtask($data, $id){
        $subtask = $this->subtask->find($id);
        $subtask->update($data);
    }


    //check
    public function getsubCheck($id) {
        return $this->subtask->find($id);
    }

    //updating checked
    public function updatesubChecked($data, $id){
        $subtask = $this->subtask->find($id);

        $subtask->update($data);
    }


}