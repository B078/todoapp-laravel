@extends('layouts.app')

@section('content')

    <h1>Task List</h1>


    @foreach($tasks as $task)
    <div class="card @if($task->isCompleted()) border-success  @endif" style="margin-bottom: 20px">
        <div class="card-body">
            <p> 
                {{ $task->description}} 
            </p>
            <form action="/tasks/{{ $task->id }}" method="POST">
                @method('PATCH')
                @csrf
                @if(!$task->isCompleted())
                <button class="btn btn-light btn-block d-grid w-100" input="submit">Complete</button>
                @endif
            </form>
        </div>
    </div>
    @endforeach
    <a href="/tasks/create" class="btn btn-primary btn-lg btn-block d-grid">New Task</a>
@endsection