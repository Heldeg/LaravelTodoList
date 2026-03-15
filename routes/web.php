<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function () {
    return redirect()->route('tasks.index');
})->name('home');

Route::middleware('auth')->group(function () {
    

    Route::middleware('role:admin|editor')->group(function () {
        Route::resource('tasks', TaskController::class)->except(['index', 'show']);
    });
    Route::resource('tasks', TaskController::class)->only(['index', 'show']);


});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
});

// CRUD routes  test for tasks
/*Route::get('/',function(){
    return redirect()->route('tasks.index');
});*/

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
