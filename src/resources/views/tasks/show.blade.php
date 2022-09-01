@extends('layouts.application')

@section('content')
    <h1>タスクの詳細</h1>
        <h3>タスク名:</h3>
        <h5>{{ $task->title }}</h5>
        <h3>タスク詳細:</h3>
        <h5>{{ $task->content }}</h5>
    <hr>
    <a href="{{ route('tasks.edit', $task->id) }}">タスクを編集する</a><br>
    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" name="" value="タスクを削除する" onclick="return confirm('タスクを削除します(削除したら戻せません)。\nよろしいですか');">
    </form><br>
    <hr>
    <menu label="リンク">
        <a href="{{ route('tasks.index') }}">一覧画面に戻る</a><br>
        <a href="#">ログアウト</a><br>
    </menu>
@endsection
