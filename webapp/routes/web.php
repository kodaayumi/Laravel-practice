<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [PostsController::class, 'index'])->name('index');

Route::middleware(['auth'])->group(function () {
    // 投稿関連のルート
    Route::get('/create', [PostsController::class, 'showCreate'])->name('show.create');
    Route::post('/store', [PostsController::class, 'store'])->name('store.post');
    Route::get('/edit/{id}', [PostsController::class, 'showEdit'])->name('show.edit');
    Route::post('/edit/{id}', [PostsController::class, 'registEdit'])->name('regist.edit');
    Route::post('/delete/{id}', [PostsController::class, 'delete'])->name('delete');
    
    // プロフィール関連のルート
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
