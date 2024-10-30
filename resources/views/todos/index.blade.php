<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="mb-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">Todo List</h1>
            <a href="{{ route('todos.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add New Todo</a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow">
            @foreach($todos as $todo)
                <div class="border-b p-4 flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <form action="{{ route('todos.toggle', $todo) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="checkbox" 
                                   onchange="this.form.submit()" 
                                   {{ $todo->completed ? 'checked' : '' }}
                                   class="h-4 w-4">
                        </form>
                        <div>
                            <h3 class="font-medium {{ $todo->completed ? 'line-through text-gray-400' : '' }}">
                                {{ $todo->title }}
                            </h3>
                            <p class="text-gray-500">{{ $todo->description }}</p>
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('todos.edit', $todo) }}" 
                           class="text-blue-500 hover:text-blue-700">Edit</a>
                        <form action="{{ route('todos.destroy', $todo) }}" method="POST" 
                              onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500 hover:text-red-700">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>