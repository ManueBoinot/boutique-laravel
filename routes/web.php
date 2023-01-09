<?php

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
    return view('welcome');
});

Auth::routes();
Route::get('panier', [App\Http\Controllers\PanierController::class,'afficher'])->name('panier.afficher');
Route::post('panier.ajouter/{article}', [App\Http\Controllers\PanierController::class,'ajouter'])->name('panier.ajouter');
Route::get('panier.supprimer/{article}', [App\Http\Controllers\PanierController::class,'supprimer'])->name('panier.supprimer');
Route::get('panier.vider', [App\Http\Controllers\PanierController::class,'vider'])->name('panier.vider');
Route::post('commande', [App\Http\Controllers\CommandeController::class, 'valider'])->name('commande.valider');
//Route::get('articles.modifier/{article}', [App\Http\Controllers\ArticleController::class, 'edit'])->name('articles.modifier');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/users', App\Http\Controllers\UserController::class)->except('index', 'create', 'store');

Route::put('/user/modif-password/{user}', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('updatePassword');

Route::resource('/adresses', App\Http\Controllers\AdresseController::class)->except(['index', 'show']);

Route::resource('/commande', App\Http\Controllers\CommandeController::class)->except(['destroy']);

Route::resource('/articles', App\Http\Controllers\ArticleController::class);
Route::resource('/gammes', App\Http\Controllers\GammeController::class);
