@extends('layouts.main')

<link rel="stylesheet" href="../css/edit.css">

@section('content')

        <h1> To-Do Subtask </h1>
        
        <form action="{{ route('saveEditsub')}}" method="POST">
        @csrf  
                <input type="text" class="input" name="editsubtask" value ="{{ $subtasks -> subtask }}" placeholder="edit sub task" autocomplete="off">
                <input type="hidden" name="id" value="{{ $subtasks->id}}">
                <button type="submit" class="button"> Update </button>
        </form>

@endsection