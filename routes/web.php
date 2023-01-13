<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ARTICLES POPULAIRES -----------------------
Route::get('populaires', [App\Http\Controllers\ArticleController::class, 'popularite'])->name('article.popularite');

// PANIER -----------------------
Route::get('panier', [App\Http\Controllers\PanierController::class, 'afficher'])->name('panier.afficher');
Route::post('panier.ajouter/{article}', [App\Http\Controllers\PanierController::class, 'ajouter'])->name('panier.ajouter');
Route::get('panier.supprimer/{article}', [App\Http\Controllers\PanierController::class, 'supprimer'])->name('panier.supprimer');
Route::get('panier.vider', [App\Http\Controllers\PanierController::class, 'vider'])->name('panier.vider');

// USER -----------------------------------
Route::put('/user/modif-password/{user}', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('updatePassword');

// BACK OFFICE -----------------------------------
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');

// ROUTES MODE RESSOURCE (crée automatiquement les routes de base CRUD)
Route::resource('/campagne', CampagneController::class);
Route::resource('/adresses', App\Http\Controllers\AdresseController::class)->except(['index', 'show']);
Route::resource('/commande', App\Http\Controllers\CommandeController::class)->except(['destroy']);
Route::resource('/articles', App\Http\Controllers\ArticleController::class);
Route::resource('/gammes', App\Http\Controllers\GammeController::class);
Route::resource('/users', App\Http\Controllers\UserController::class)->except('index', 'create', 'store');
Route::resource('/avis', App\Http\Controllers\AvisController::class)->except('index','create');

// FAVORIS ----------------------------
Route::get('favoris', [App\Http\Controllers\FavoriController::class, 'index'])->name('favoris.index');
Route::post('favoris', [App\Http\Controllers\FavoriController::class, 'store'])->name('favoris.store');
Route::delete('favoris', [App\Http\Controllers\FavoriController::class, 'destroy'])->name('favoris.destroy');

