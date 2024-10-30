<?php

use App\Http\Controllers\TodoController;

Route::resource('todos', TodoController::class);
Route::patch('todos/{todo}/toggle', [TodoController::class, 'toggleComplete'])->name('todos.toggle');