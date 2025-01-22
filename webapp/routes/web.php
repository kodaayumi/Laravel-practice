<?php

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

Route::get('/', function () {
    return view('welcome');
});

//各URLにリクエストが来た場合にメソッドが実行される
Route::get('/index', [App\Http\Controllers\PostsController::class, 'index'])->name('index');
Route::get('create', [App\Http\Controllers\PostsController::class, 'showCreate'])->name('show.create');
Route::post('create', [App\Http\Controllers\PostsController::class, 'storePost'])->name('store.post');
Route::get('edit/{id}', [App\Http\Controllers\PostsController::class, 'showEdit'])->name('show.edit');
Route::post('edit/{id}', [App\Http\Controllers\PostsController::class, 'registEdit'])->name('regist.edit');
Route::delete('delete/{id}', [App\Http\Controllers\PostsController::class, 'deletePost'])->name('delete');

// // 課題4
// Route::get('/index',
// [App\Http\Controllers\PostsController::class, 'index']);

// // 課題7
// Route::get('/show',
// [App\Http\Controllers\PostsController::class, 'show']);