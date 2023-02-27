@extends('layouts.main')

<link rel="stylesheet" href="../css/edit.css">

@section('content')
        <h1> My Todo List </h1>
        
        <form action="{{ route('saveEdit')}}" method="POST">
        @csrf  
                <input type="text" class="input "name="edit" value ="{{ $task-> task}}" placeholder="edit list" autocomplete="off">
                <input type="hidden" name="id" value="{{ $task->id }}">
                <input type="datetime-local" class="input1" name="editdue" value="{{ $task->due }}" placeholder="Task due" autocomplete="off" required>
                <button type="submit" class="button"> Update </button>
        </form>
@endsection
