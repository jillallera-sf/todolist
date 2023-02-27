<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SubtaskRepository;

class SubtaskController extends Controller
{
    protected $subtask;

    function __construct(SubtaskRepository $subtask){
        $this->subtask = $subtask;
    }

    function add(){
        $subtasks = $this->subtask->getSubtask();
        return view('add', compact('subtasks'));
    }

    function saveSubtask(Request $request){
        $data = [
            'subtask'=>$request->subtask
        ];

        $this->subtask->saveSubtask($data);

        return back();
    }

    function deleteSubtask($id){
        $this->subtask->deleteSubtask($id);

        return back();
    }

    function updateSubtask($id){
        $subtasks = $this->subtask->getTask($id);
        return view('edit-subtask', compact('subtasks'));
    }

    function saveEditsub(Request $request){
        $data = [
            'subtask'=>$request->editsubtask
        ];

        $this->subtask->updateSubtask($data,$request->id);
        return redirect()->route('add');
        }

    
    function updatesubChecked($id){
            $task = $this->todo->getsubCheck($id);
            return view('add', compact('subtasks'));
        }
    
    function savesubChecked(Request $request, $id){
            $data = [
                'is_checked' => $request->is_checked,
            ];
    
            $this->subtask->updatesubChecked($data, $request->id);
            return back();
        }
}
