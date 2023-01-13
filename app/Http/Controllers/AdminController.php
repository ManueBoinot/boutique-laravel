<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Gamme;
use App\Models\User;
use App\Models\Campagne;


class AdminController extends Controller
{
   public function index(){

      $articles = Article::all();
      $gammes = Gamme::all();
      $users = User::with('role')->get();
      $campagnes = Campagne::with('articles')->get();
      return view('admin.index',['articles' => $articles, 'gammes'=>$gammes, 'users'=>$users, 'campagnes' =>  $campagnes]);
   }
      
}
