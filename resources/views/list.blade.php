@extends('layouts.main')

   
@section('content')
        <div class="first">
            <h1> My To-do List </h1>
            
            <form action="{{ route('saveTask') }}" method="POST">
            @csrf  
                    <input type="text" class="input" name="task" placeholder="To do" autocomplete="off" required>
                    <!-- <input placeholder="Due Date" type="text" name="taskdue" class="input1" onfocusin="(this.type='datetime-local')" onfocusout="(this.type='txt')" id="date"> -->
                    <input type="datetime-local" class="input1" name="taskdue" placeholder="task due" autocomplete="off" required>
                    <button type="submit" class="button"> Add </button>
            </form>
        </div>
        
        <div class="second">
        <table class="table">
            <thead> 
                <tr>
                    <th> </th>
                    <th> Task </th>
                    <th> Due </th>
                    <th>  </th>
                </tr>
            </thead>

            <tbody>
                @if($tasks)
                @foreach($tasks as $task)
                <tr>
                    <td>
                        <form action="{{ route('saveChecked', $task) }}" method="post">
                            @csrf
                            @method('PATCH')
                                <?php 
                                if($task->is_checked){
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
                    <td> {!! $task->is_checked ? '<del>' . $task->task .'</del>' : $task->task !!}
                    </td>

                    <td> {!! $task->is_checked ? '<del>' . $task->due .'</del>' : $task->due !!}</td>
                    <td>
                        <?php 
                            if($task->is_checked){
                        ?>
                            <a class="link" href="{{ route('deleteTask', $task->id) }}"><i class="bi-trash"></i></a>
                        <?php
                            }else{
                        ?>
                            <a class="link" href="{{ route('add')}}"><i class="bi-plus-square"></i></a>
                            <a class="link" href="{{ route('updateTask', $task->id) }}"><i class="bi-pencil-square"></i></a>
                            <a class="link" href="{{ route('deleteTask', $task->id) }}"><i class="bi-trash"></i></a>
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
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

@endsection