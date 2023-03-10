<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('task')->group(function (){
    Route::get('/create', [App\Http\Controllers\TaskController::class, 'create'])->name('task.create');
    Route::get('/update/{task}', [App\Http\Controllers\TaskController::class, 'update'])->name('task.update')->where('task', '\d+');
    Route::post('/store/{task?}', [App\Http\Controllers\TaskController::class, 'store'])->name('task.store')->where('task', '\d+');;
});
