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

Route::get('/sucheduleadd', function () {
    return view('sucheduleadd');
});

Route::get('/suchedulelist', function () {
    return view('suchedulelist');
});

Route::get('/nippouresult', function () {
    return view('nippouresult');
});

Route::get('/nippoulist', function () {
    return view('nippoulist');
});

Route::get('/productlist', function () {
    return view('productlist');
});

Route::get('/productadd', function () {
    return view('productadd');
});

Route::get('/feelist', function () {
    return view('feelist');
});

Route::get('/post/index2', [PostController::class, 'index2'])->name('post.index2');

Route::get('/post/add', [PostController::class, 'add'])->name('post.add');
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');

Route::get('/post/page', [PostController::class, 'page'])->name('post.page');
Route::post('/post/page', [PostController::class, 'page'])->name('post.page');

Route::get('/post/page2', [PostController::class, 'page2'])->name('post.page2');
Route::post('/post/page2', [PostController::class, 'page2'])->name('post.page2');

Route::get('/post/edit', [PostController::class, 'edit'])->name('post.edit');
Route::post('/post/edit', [PostController::class, 'edit'])->name('post.edit');

Route::get('/post/fee', [PostController::class, 'fee'])->name('post.fee');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
