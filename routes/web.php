<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
    return view('index');
});

Route::get('/post/index', [PostController::class, 'index'])->name('post.index');

Route::get('/post/add', [PostController::class, 'add'])->name('post.add');
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');

Route::get('/post/page', [PostController::class, 'page'])->name('post.page');
Route::post('/post/page', [PostController::class, 'page'])->name('post.page');

Route::get('/post/page2', [PostController::class, 'page2'])->name('post.page2');
Route::post('/post/page2', [PostController::class, 'page2'])->name('post.page2');
