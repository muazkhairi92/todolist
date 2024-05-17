<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('web')->group(function () {
Route::get('/', [TodoController::class,'index'])->name('todo.index');
Route::post('/todo', [TodoController::class, 'store'])->name('todo.create');
Route::post('/clear_flag', [TodoController::class, 'clearFlag'])->name('clear_flag');
});
