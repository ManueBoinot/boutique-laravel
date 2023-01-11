<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Gamme;
use App\Models\User;

class AdminController extends Controller
{
   public function index(){

      $articles = Article::all();
      $gammes = Gamme::all();
      $users = User::with('role')->get();
      return view('admin.index',['articles' => $articles, 'gammes'=>$gammes, 'users'=>$users]);
   }
      
}