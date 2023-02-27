@extends('layouts.main')

@section('content')
        <div class="first">
            <h1> To-do Subtask </h1>
            
            <form action="{{ route('saveSubtask') }}" method="POST">
            @csrf  
                    <input type="text" class="input" name="subtask" placeholder="To do" autocomplete="off" required>
                    <input type="hidden" name="todo_id" value="">
                    <!-- <input placeholder="Due Date" type="text" name="taskdue" class="input1" onfocusin="(this.type='datetime-local')" onfocusout="(this.type='txt')" id="date"> -->
                    <button type="submit" class="button"> Add </button>
            </form>
        </div>
        <div class="second">
        <table class="table">
            <thead> 
                <tr>
                    <th> </th>
                    <th> Subtask </th>
                    <th> </th>
                </tr>
            </thead>

            <tbody>
                @if($subtasks)
                @foreach($subtasks as $subtask)
                <tr>
                    <tr>
                        <td></td>
                    </tr>

                    <td>
                        <form action="{{ route('savesubChecked', $subtask) }}" method="post">
                            @csrf
                            @method('PATCH')
                                <?php 
                                if($subtask->is_checked){
                                ?>
                                    <input type="checkbox" name="is_checked" value="1" name="is_checked" checked disabled onchange="event.preventDefault(); this.closest('form').submit();" class="check">
                                <?php
                                    }else{
                                ?>
                                    <input type="checkbox" name="is_checked" value="1" name="is_checked" onchange="event.preventDefault(); this.closest('form').submit();" class="check">
                                <?php 
                                    }
                                ?>
                        </form>
                    </td>
                   
                    <td>  {!! $subtask->is_checked ? '<del>' . $subtask->subtask .'</del>' : $subtask->subtask !!} </td>
                    <td>
                        <?php 
                            if($subtask->is_checked){
                        ?>
                            <a href="{{ route('deleteSubtask', $subtask->id) }}"><i class="bi-trash"></i></a>
                        <?php
                            }else{
                        ?>
                             <a href="{{ route('updateSubtask', $subtask->id) }}"><i class="bi-pencil-square"></i></a>
                             <a href="{{ route('deleteSubtask', $subtask->id) }}"><i class="bi-trash"></i></a>
                        <?php 
                            }
                        ?>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        </div>
        <div class="back">
                <button type="submit" class="button"><a href="{{ route('list') }}"> Back </a></button>
        </div>
@endsection