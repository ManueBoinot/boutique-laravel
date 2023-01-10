<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Gamme;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function index(){

      $articles = Article::get();
      $gammes = Gamme::get();
      return view('admin.index',['articles' => $articles, 'gammes'=>$gammes]);
    
   }
}
