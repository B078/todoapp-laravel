
@extends('layouts.app')


@section('content')
    
<h1>New Tasks</h1>

<form action="/tasks" method="POST">
    <div class="form-group">
        @csrf
        <label for="description" class="fs-5">Task Description</label>
        <input class="form-control" name="description" id="description">
    </div>
    <div class="form-group" >
        <button type="submit" class="btn btn-primary mt-2">Create Tasks</button>
    </div>
</form>
@endsection
