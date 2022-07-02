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

Route::prefix('post')->group(function () {
    Route::get('index2', [PostController::class, 'index2'])->name('post.index2');
    Route::get('add', [PostController::class, 'add'])->name('post.add');
    Route::post('store', [PostController::class, 'store'])->name('post.store');
    Route::get('page', [PostController::class, 'page'])->name('post.page');
    Route::post('page', [PostController::class, 'page'])->name('post.page');
    Route::get('calendar', [PostController::class, 'calendar'])->name('post.calendar');
    Route::post('calendar', [PostController::class, 'calendar'])->name('post.calendar');
    Route::get('edit', [PostController::class, 'edit'])->name('post.edit');
    Route::post('edit', [PostController::class, 'edit'])->name('post.edit');
    Route::get('fee', [PostController::class, 'fee'])->name('post.fee');

    Route::get('hundsontable', [PostController::class, 'hundsontable'])->name('post.hundsontable');
    Route::get('tabulator', [PostController::class, 'tabulator'])->name('post.tabulator');
});

Route::group(['middleware' => 'basicauth'], function() {
    Route::get('/', function () {
        return view('index');
    });
    Route::prefix('post')->group(function () {
        Route::get('index2', [PostController::class, 'index2'])->name('post.index2');
        Route::get('add', [PostController::class, 'add'])->name('post.add');
        Route::post('store', [PostController::class, 'store'])->name('post.store');
        Route::get('page', [PostController::class, 'page'])->name('post.page');
        Route::post('page', [PostController::class, 'page'])->name('post.page');
        Route::get('calendar', [PostController::class, 'calendar'])->name('post.calendar');
        Route::post('calendar', [PostController::class, 'calendar'])->name('post.calendar');
        Route::get('edit', [PostController::class, 'edit'])->name('post.edit');
        Route::post('edit', [PostController::class, 'edit'])->name('post.edit');
        Route::get('fee', [PostController::class, 'fee'])->name('post.fee');

        Route::get('hundsontable', [PostController::class, 'hundsontable'])->name('post.hundsontable');
    });
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
