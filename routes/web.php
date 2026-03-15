<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function () {
    return redirect()->route('tasks.index');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('tasks', App\Http\Controllers\TaskController::class);
});

// CRUD routes  test for tasks
/*Route::get('/',function(){
    return redirect()->route('tasks.index');
});*/

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
