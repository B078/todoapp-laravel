<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{   //laat de volgorde zien van de taken
    public function index() {
        $tasks = Task::orderby('completed_at')
        ->orderBy('id', 'DESC')
        ->get();

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }
    // laaat de maak de taak pagina zien
    public function create() {
        return view('tasks.create');
    }

    //behoud de taak 
    public function store() {
        request()->validate([
            'description' => 'required|max:255',
        ]);
            Task::create([
            'description' => request('description'),
        ]);
        
        return redirect('/');
    }
    //update te tijd wnr de taak voltooid is
    public function update($id) {
        $task = Task::where('id', $id)->first();

        $task->completed_at = now();
        $task->save();

        return redirect('/');
    }
    //verwijder de taak
    public function delete($id) {
        $task = Task::where('id', $id)->first();

        $task->delete();

        return redirect('/');
        
    }

}
