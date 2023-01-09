<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CampagneController;

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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('boutique.home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('boutique.home');
// AJOUTER ARTICLE AU PANIER
Route::post('panier.ajouter/{article}', [App\Http\Controllers\PanierController::class,'ajouter'])->name('panier.ajouter');

// ROUTES MODE RESSOURCE (crée automatiquement les routes de base CRUD)
Route::resource('/article', ArticleController::class);
Route::resource('/campagne', CampagneController::class);
