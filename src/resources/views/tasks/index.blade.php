<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('タスクの一覧') }}
        </h2>
    </x-slot>

    <div class="items-center pt-8 py-4">
        <a class="items-center px-4 py-2 bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-white border border-blue-500 hover:border-transparent rounded"
            href="{{ route('tasks.create') }}">タスクの新規作成</a>
    </div>
    <div class="items-center px-4 py-2 text-base">
        @foreach($tasks as $task)
            <div class="flex justify-between py-2 border-b border-gray-400">
                <div class="px-4 py-2">{{ $task->title }}</div>
                <div class="flex justify-end space-x-4">
                    <a class="items-center px-4 py-2 bg-transparent hover:bg-gray-500 text-gray-500 font-semibold hover:text-white border border-gray-500 hover:border-transparent rounded"
                        href="{{ route('tasks.show', ['task' => $task->id]) }}">詳細</a>
                    <a class="items-center px-4 py-2 bg-transparent hover:bg-gray-500 text-gray-500 font-semibold hover:text-white border border-gray-500 hover:border-transparent rounded"
                        href="{{ route('tasks.edit', ['task' => $task->id]) }}">編集</a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" name="" value="削除"
                            class="items-center px-4 py-2 bg-transparent hover:bg-red-500 text-red-500 font-semibold hover:text-white border border-red-500 hover:border-transparent rounded"
                            onclick="return confirm('タスクを削除します(削除したら戻せません)。\nよろしいですか');">
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <hr>
</x-app-layout>
