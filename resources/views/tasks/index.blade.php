@extends('layouts.app')

@section('content')

    <h1>Task List</h1>


    @foreach($tasks as $task)
    <div class="card @if($task->isCompleted()) border border-success border-2 @endif" style="margin-bottom: 20px">

        <div class="card-body">
            <p> 
                {{ $task->description}} 
            </p>
            @if(!$task->isCompleted())
                <form action="/tasks/{{ $task->id }}" method="POST">
                    @method('PATCH')
                    @csrf
                    
                    <button class="btn btn-light btn-block d-grid w-100" input="submit">Complete</button>
                </form>
            @else
            <form action="/tasks/{{ $task->id }}" method="POST">
                @method('DELETE')
                @csrf
                
                <button class="btn btn-danger btn-block d-grid w-100" input="submit">Delete</button>
            </form>
            @endif
        </div>
    </div>
    @endforeach
    <a href="/tasks/create" class="btn btn-primary btn-lg btn-block d-grid">New Task</a>
@endsection