<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    public function create()
    {
        //
    }

    public function store()
    {
        //
    }

    /** */
    public function show($id)
    {
        $task = Task::find($id);
        return view('tasks.show', [
            'task' => $task,
        ]);
    }

    public function edit()
    {
        //
    }

    public function update()
    {
        //
    }

    public function destroy()
    {
        //
    }
}
