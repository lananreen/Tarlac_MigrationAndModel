<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GreetController;
use App\Http\Controllers\TaskController; 

Route::get('/', function () {
    return 'Hello, Laravel 𐔌՞ ܸ.ˬ.ܸ՞𐦯';
});

Route::get('/greet', [GreetController::class, 'showGreeting']);

Route::resource('tasks', TaskController::class);