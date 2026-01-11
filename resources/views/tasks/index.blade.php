<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Project Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl p-6">
        <h1 class="text-2xl font-bold mb-4 text-center">Daftar Tugas</h1>

        <form action="{{ route('tasks.store') }}" method="POST" class="flex mb-4 gap-2">
            @csrf
            <input type="text" name="title" placeholder="Tugas baru..." class="flex-1 border rounded p-2" required>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah</button>
        </form>

        <ul>
            @foreach ($tasks as $task)
                <li class="flex justify-between items-center border-b py-2">
                    <span class="{{ $task->is_completed ? 'line-through text-gray-400' : 'text-gray-800' }}">
                        {{ $task->title }}
                    </span>

                    <div class="flex gap-2">
                        @if (!$task->is_completed)
                            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="text-xs bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600">
                                    Selesai
                                </button>
                            </form>
                        @else
                            <span class="text-xs bg-gray-200 text-gray-600 px-2 py-1 rounded">Done</span>
                        @endif

                         <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">
                                X
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>