@extends('layouts.application')

@section('content')
    <h1>タスクの登録</h1>
    <!--TODO メッセージはパーシャルにする -->
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        タスク名:<input type="string" name="title" value="{{ $task->title }}"><br>
        タスク詳細:<input type="text" name="content" value="{{ $task->content }}"><br>
        <button>タスクを編集する</button>
    </form>
    <hr>
    <menu label="リンク">
        <a href="{{ route('tasks.show', ['task' => $task->id]) }}">詳細画面に戻る</a><br>
        <a href="{{ route('tasks.index') }}">一覧画面に戻る</a><br>
        <a href="#">ログアウト</a><br>
    </menu>
@endsection
