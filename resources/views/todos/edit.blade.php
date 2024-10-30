<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Todo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-md mx-auto bg-white rounded-lg shadow p-6">
            <h1 class="text-2xl font-bold mb-4">Edit Todo</h1>

            <form action="{{ route('todos.update', $todo) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2" for="title">Title</label>
                    <input type="text" 
                           name="title" 
                           id="title" 
                           value="{{ $todo->title }}"
                           class="w-full border rounded px-3 py-2"
                           required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2" for="description">Description</label>
                    <textarea name="description" 
                              id="description" 
                              class="w-full border rounded px-3 py-2"
                              rows="3">{{ $todo->description }}</textarea>
                </div>

                <div class="flex justify-between">
                    <a href="{{ route('todos.index') }}" 
                       class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</a>
                    <button type="submit" 
                            class="bg-blue-500 text-white px-4 py-2 rounded">Update Todo</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>