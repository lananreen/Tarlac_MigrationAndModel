<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GreetController;
use App\Http\Controllers\TaskController; 

Route::get('/', function () {
    return 'Hello, Laravel!';
});

Route::get('/greet', [GreetController::class, 'showGreeting']);

Route::resource('tasks', TaskController::class);