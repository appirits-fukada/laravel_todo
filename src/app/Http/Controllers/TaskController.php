<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Http\Requests\StoreTask;
use App\Library\AppHelper;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(StoreTask $request)
    {
        $task = new Task;
        $task->title = $request->title;
        $task->content = $request->content;
        $task->user_id = Auth::id();
        $task->save();
        //TODO flashメッセージは別ファイルで設定できないか？
        return redirect()->route('tasks.show', ['task' => $task->id])->with('success', '新規タスクを作成しました。');
    }

    /** */
    public function show($id)
    {
        // user_idがAuth::id()と一致しない場合は弾く
        $task = Task::find($id);
        if($task->use_id == Auth::id()) {
            return view('tasks.show', [
                'task' => $task,
            ]);
        } else {
            return redirect()->route('tasks.index');
        }
    }

    public function edit($id)
    {
        $task = Task::find($id);
        if($task->use_id == Auth::id()) {
            return view('tasks.edit', [
                'task' => $task,
            ]);
        } else {
            return redirect()->route('tasks.index');
        }
    }

    public function update(StoreTask$request, $id)
    {
        $update = [
            'title' => $request->title,
            'content'=> $request->content,
        ];
        $task = Task::where('id', $id);
        if($task->use_id == Auth::id()) {
            $task->update($update);
            return redirect()->route('tasks.show', ['task' => $id])->with('success', 'タスクを編集しました。');
        } else {
            return redirect()->route('tasks.index');
        }
    }

    public function destroy($id)
    {
        $task = Task::where('id', $id);
        if($task->use_id == Auth::id()) {
            $task->delete();
            return redirect()->route('tasks.index')->with('success', 'タスクを削除しました。');
        } else {
            return redirect()->route('tasks.index');
        }
    }
}
