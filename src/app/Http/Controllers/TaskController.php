<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all()
        return view('tasks/index', [
            'tasks' => $tasks,
        ]);
    }
}
