<x-app-layout>
    <h1>タスク一覧</h1>
    <table border="1">
        <tr>
            <th>タスク名</th>
        </tr>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td><a href="{{ route('tasks.show', ['task' => $task->id]) }}">詳細</a></td>
                    <td><a href="{{ route('tasks.edit', ['task' => $task->id]) }}">編集</a></td>
                    <td>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" name="" value="削除">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <menu label="リンク">
        <a href="{{ route('tasks.create') }}">タスクの新規作成</a><br>
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('ログアウト') }}
            </x-responsive-nav-link>
        </form>
    </menu>
</x-app-layout>
