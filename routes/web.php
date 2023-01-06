<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// HOME ----------------------
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// HOME ----------------------
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// ARTICLE DETAIL ----------------------
Route::get('{article}', [App\Http\Controllers\ArticleController::class, 'show'])->name('article-detail');
