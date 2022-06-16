<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Todocontroller;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/todo', [TodoController::class, 'index'])->middleware(['auth']);
Route::post('/todo/create', [TodoController::class, 'create'])
->middleware(['auth'])->name('todo.create');
Route::post('/todo/update', [TodoController::class, 'update'])->name('todo.update');
Route::post('/todo/delete', [TodoController::class, 'delete']);
