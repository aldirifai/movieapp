<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('homepage');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::resource('kategori', CategoryController::class)->only(['index', 'store', 'destroy', 'update']);
});

Route::get('kategori/{slug}', [CategoryController::class, 'show'])->name('kategori.show');

Route::get('detail/{slug}', [App\Http\Controllers\DetailController::class, 'show'])->name('detail.show');
