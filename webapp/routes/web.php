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

Route::get('/hello', function () {
    return view('welcome');
});

// 課題4
Route::get('/index',
[App\Http\Controllers\PostsController::class, 'index']);

// 課題7
Route::get('/show',
[App\Http\Controllers\PostsController::class, 'show']);